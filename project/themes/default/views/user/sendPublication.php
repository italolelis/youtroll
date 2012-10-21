<h1 class="page-title"><?= HApp::t('sendPublication') ?></h1>
<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'sendPublicatioinForm',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
        ),
    ));
?>
<div class="input-block">
    <?= $form->labelEx($model, 'title') ?>
    <?= $form->textField($model, 'title') ?>
    <?= $form->error($model, 'title') ?>
</div>
<div class="input-block">
<?php if (!(preg_match('/MSIE/i', Yii::app()->request->userAgent) && !preg_match('/Opera/i', Yii::app()->request->userAgent))): ?>
    <?= $form->labelEx($model, 'image_path') ?>
    <div class="ajaxUpload">
	<?php
	$this->widget('ext.EAjaxUpload.EAjaxUpload', array(
	    'id' => 'contactAjaxUpload',
	    'config' => array(
		'action' => Yii::app()->createAbsoluteUrl('ajax/uploadFile'),
		'allowedExtensions' => explode(', ', $model->annexExtensions),
		'sizeLimit' => $model->maxSizeAnnex,
		'minSizeLimit' => $model->minSizeAnnex,
		'messages' => array(
		    'sizeError' => HApp::t('eauSizeError'),
		    'minSizeError' => HApp::t('eauMinSizeError'),
		    'onLeave' => HApp::t('eauOnLeave'),
		    'typeError' => HApp::t('eauTypeError'),
		    'emptyError' => HApp::t('eauEmptyError'),
		),
		'onComplete' => 'js:function(id, fileName, responseJSON) {
                    clearErrorsMesages();
                    $(".qq-upload-button").hide();
                    
		    if(responseJSON["success"] === true) {
			$(".qq-upload-status").last().append("<a href=\'#\' class=\'qq-upload-remove\'>' . HApp::t('remove') . '</a>");

			$(".qq-upload-remove").last().bind("click", function() {
			    statusItem = $(this).parent();

			    $.ajax(
			    {
				url:"' . Yii::app()->createAbsoluteUrl('ajax/deleteFile') . '",
				type:"POST",
				cache:false,
				dataType:"html",
				data:{fileName:fileName},
				success:function(response) {                                    
				    statusItem.fadeOut(1500, function() {
					$(this).remove();
                                        $(".qq-upload-button").fadeIn();
				    });
				},
				error:function(error, b, c, d, e) {
				    setAlertMessage(error.responseText, "warning", "qq-upload-message");

				    if(error.status === 404) {
					statusItem.fadeOut(1500, function() {
					    $(this).remove();
					});
				    }
				}
			    });
			});
		    }
		}',
		'showMessage' => 'js:function(message) {
		    setAlertMessage(message, "warning", "qq-upload-message");
		}',
	    ),
	));
	?>
    </div>
    <?= $form->hiddenField($model, 'image_path') ?>
    <?= $form->error($model, 'image_path') ?>
<?php endif; ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'description') ?>
    <?= $form->textArea($model, 'description') ?>
    <?= $form->error($model, 'description') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'category') ?>
    <?= $form->dropDownList($model, 'category', Category::getCategories()) ?>
    <?= $form->error($model, 'category') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'tags') ?>
    <?= $form->textField($model, 'tags') ?>
    <?= $form->error($model, 'tags') ?>
</div>

<div>
    <?php
    echo CHtml::ajaxButton(HApp::t('sendPublicationButton'), array('form/sendPublication'),
            HView::getAjaxSubmitButtonConfig(),
            array(
                'id' => 'sendPublicationButton',
                'class' => 'button',
                'live' => false,
            )
        );
    ?>
</div>

<?php $this->endWidget(); ?>
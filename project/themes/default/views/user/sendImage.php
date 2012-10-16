<h1 class="page-title"><?= HApp::t('sendImage') ?></h1>
<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'sendImageForm',
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
    <?= $form->labelEx($model, 'image') ?>
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
		    'sizeError' => Yii::t('app', 'O arquivo <strong>{file}</strong> deve ter no máximo: {sizeLimit}.'),
		    'minSizeError' => Yii::t('app', 'O arquivo <strong>{file}</strong> deve ter no mínimo: {minSizeLimit}.'),
		    'onLeave' => Yii::t('app', 'O envio do(s) arquivo(s) já foi(ram) iniciado(s), se você sair agora, tudo será cancelado.'),
		    'typeError' => Yii::t('app', 'O tipo do arquivo <strong>{file}</strong> não é suportado. Os tipos permitidos são: {extensions}.'),
		    'emptyError' => Yii::t('app', 'O arquivo <strong>{file}</strong> está vazio. Por favor, selecione outro arquivo ou tente novamente.'),
		),
		'onComplete' => 'js:function(id, fileName, responseJSON) {
                    $(".qq-upload-button").hide();
                    
		    if(responseJSON["success"] === true) {
			$(".qq-upload-status").last().append("<a href=\'#\' class=\'qq-upload-remove\'>' . Yii::t('app', 'Remover') . '</a>");

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
    echo CHtml::ajaxButton(HApp::t('sendImageButton'), array('form/sendImage'),
            HView::getAjaxSubmitButtonConfig(),
            array(
                'id' => 'sendImageButton',
                'class' => 'button',
                'live' => false,
            )
        );
    ?>
</div>

<?php $this->endWidget(); ?>
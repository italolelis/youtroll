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
    <?= $form->labelEx($model, 'description') ?>
    <?= $form->textField($model, 'description') ?>
    <?= $form->error($model, 'description') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'image') ?>
    <?= $form->passwordField($model, 'image') ?>
    <?= $form->error($model, 'image') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'tags') ?>
    <?= $form->passwordField($model, 'tags') ?>
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
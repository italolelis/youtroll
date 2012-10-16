<h3><?= HApp::t('sendImage') ?></h3>
<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'signUpForm',
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
    <?= $form->labelEx($model, 'username') ?>
    <?= $form->textField($model, 'username') ?>
    <?= $form->error($model, 'username') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'email') ?>
    <?= $form->textField($model, 'email') ?>
    <?= $form->error($model, 'email') ?>
</div>
<div class="input-block">
    <?= $form->labelEx($model, 'password') ?>
    <?= $form->passwordField($model, 'password') ?>
    <?= $form->error($model, 'password') ?>
</div>

<div>
    <?php
    echo CHtml::ajaxButton(HApp::t('signUpButton'), array('form/signUp'),
            HView::getAjaxSubmitButtonConfig(),
            array(
                'id' => 'signUpButton',
                'class' => 'button',
                'live' => false,
            )
        );
    ?>
</div>

<?php $this->endWidget(); ?>
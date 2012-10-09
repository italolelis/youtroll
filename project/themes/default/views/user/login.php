<h3><?= HApp::t('loginForm') ?></h3>
<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'loginForm',
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
    <?= $form->labelEx($model, 'password') ?>
    <?= $form->passwordField($model, 'password') ?>
    <?= $form->error($model, 'password') ?>
</div>
<div class="input-block">
    <?= $form->checkBox($model, 'rememberMe') ?>
    <?= $form->labelEx($model, 'rememberMe', array('class' => 'displayInline')) ?>
    <?= $form->error($model, 'rememberMe') ?>
</div>

<div>
    <?php
    echo CHtml::ajaxButton(HApp::t('loginButton'), array('form/login'),
     HView::getAjaxSubmitButtonConfig(),
        array(
            'id' => 'loginButton',
            'class' => 'button',
            'live' => false,
        )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
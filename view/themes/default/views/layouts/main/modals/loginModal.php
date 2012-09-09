<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'loginModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Login</h4>
</div>

<div class="modal-body">
    <div id="load-login">
        <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/load-login.gif", "load") ?>
    </div>
        <?php
        /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'verticalForm', 'enableAjaxValidation' => true, 'enableClientValidation' => true,
            'action' => 'User/login',
            'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false, 'afterValidate' => 'js:submiAjaxForm'),
            'htmlOptions' => array('class' => 'well'),
                ));
        ?>

        <?php echo $form->textFieldRow($this->modelLogin, 'username', array('class' => 'span3')); ?>
        <?php echo $form->passwordFieldRow($this->modelLogin, 'password', array('class' => 'span3')); ?>
        <div class="erro-login"></div>
        <?php echo $form->checkboxRow($this->modelLogin, 'rememberMe'); ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary',
            'label' => 'Login', 'loadingText' => 'loading...', 'htmlOptions' => array('id' => 'buttonStateful'),));
        ?>

    <?php $this->endWidget(); ?>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
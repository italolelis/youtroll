<div id=""></div>
<div class="form-cadastro-usuario">
        <?php
            /** @var BootActiveForm $form */
            $formSingUp = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'verticalForm', 'enableAjaxValidation' => true, 'enableClientValidation' => true,
                'action' => 'User/login',
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false, 'afterValidate' => 'js:submiAjaxForm'),
                'htmlOptions' => array('class' => 'well'),
            ));
         ?>    

                <?php echo $formSingUp->textFieldRow($singUpForm, 'email', array('class' => 'input-xxlarge')); ?>
                <?php echo $formSingUp->textFieldRow($singUpForm, 'login', array('class' => 'input-xlarge')); ?>
                <?php echo $formSingUp->passwordFieldRow($singUpForm, 'password', array('class' => 'span3')); ?>
                <?php echo $formSingUp->passwordFieldRow($singUpForm, 'repeatPassword', array('class' => 'span3')); ?>
                <br>
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary','label' => 'Login',));?>

        <?php $this->endWidget(); ?>
<div/>
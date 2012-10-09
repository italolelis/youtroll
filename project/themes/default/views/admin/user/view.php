<div class="form-edit-user">
    <?php
    /** @var BootActiveForm $form */
    $formEditUser = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'editUser', 'enableAjaxValidation' => false, 'enableClientValidation' => true,
        'action' => 'user/' . $id,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
        'htmlOptions' => array('class' => 'well', 'class' => 'form-user-edit'),
            ));
    ?>    

    <br>
    <?php echo $formEditUser->textFieldRow($userEditForm, 'username', array('class' => 'input-xlarge', 'name' => 'UserEditForm[usr_username]')); ?>       
    <?php echo $formEditUser->textFieldRow($userEditForm, 'record', array('class' => 'input-xlarge', 'disabled' => 'disabled')); ?>
    <?php echo $formEditUser->dropDownListRow($userEditForm, 'status', Status::getStatus(), array('name' => 'UserEditForm[usr_status]'));
    ?>       

    <?php echo $formEditUser->textFieldRow($userEditForm, 'email', array('class' => 'input-xlarge', 'name' => 'UserEditForm[usr_email]')); ?>       
    <?php echo $formEditUser->textFieldRow($userEditForm, 'birthday', array('class' => 'input-xlarge', 'name' => 'UserEditForm[usr_birthday]')); ?>       

    <?php echo $formEditUser->dropDownListRow($userEditForm, 'gender', Gender::getGenders(), array('name' => 'UserEditForm[usr_gender]'));
    ?>       

    <?php echo $formEditUser->textAreaRow($userEditForm, 'bio', array('class' => 'input-xlarge', 'name' => 'UserEditForm[usr_bio]')); ?>                     
    <?php echo $formEditUser->textFieldRow($userEditForm, 'site', array('class' => 'input-xlarge', 'name' => 'UserEditForm[usr_site]')); ?>       

    <?php
    echo $formEditUser->dropDownListRow($userEditForm, 'locale', array('Something ...', '1', '2', '3', '4', '5'), array('name' => 'UserEditForm[usr_locale]'));
    ?>   
    <br>
    <br>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit',)); ?>       

    <?php $this->endWidget(); ?>
</div>


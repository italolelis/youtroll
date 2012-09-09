<div id=""></div>
<div class="form-edit-user">
        <?php
            /** @var BootActiveForm $form */
            $formEditUser = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'verticalForm', 'enableAjaxValidation' => false, 'enableClientValidation' => true,
                'action' => 'User/',
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
                'htmlOptions' => array('class' => 'well', 'class' => 'form-user-edit'),
            ));
         ?>    
         
                <br>
         <?php echo $formEditUser->textFieldRow($userEditForm, 'username', array('class' => 'input-xlarge')); ?>       
         <?php echo $formEditUser->textFieldRow($userEditForm, 'record', array('class' => 'input-xlarge','disabled'=>'disabled')); ?>
         <?php echo $formEditUser->dropDownListRow($userEditForm, 'status', 
               array('Something ...', '1', '2', '3', '4', '5')); 
         ?>       
                
         <?php echo $formEditUser->textFieldRow($userEditForm, 'email', array('class' => 'input-xlarge')); ?>       
         <?php echo $formEditUser->textFieldRow($userEditForm, 'birthday', array('class' => 'input-xlarge')); ?>       
         
         <?php echo $formEditUser->dropDownListRow($userEditForm, 'gender', 
               array('Something ...', '1', '2', '3', '4', '5')); 
         ?>       
         
         <?php echo $formEditUser->textAreaRow($userEditForm, 'bio', array('class' => 'input-xlarge')); ?>                     
         <?php echo $formEditUser->textFieldRow($userEditForm, 'site', array('class' => 'input-xlarge')); ?>       
         
         <?php echo $formEditUser->dropDownListRow($userEditForm, 'locale', 
               array('Something ...', '1', '2', '3', '4', '5')); 
         ?>   
         <br>
         <br>
         <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary','label' => 'Submit',));?>       
                
        <?php $this->endWidget(); ?>
<div/>


<div id=""></div>
<div class="form-category">
        <?php
            /** @var BootActiveForm $form */
            $formEditUser = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'verticalForm', 'enableAjaxValidation' => false, 'enableClientValidation' => true,
                'action' => 'User/',
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
                'htmlOptions' => array('class' => 'well'),
            ));
         ?>    
         
                <br>
         <?php echo $formEditUser->textFieldRow($userEditForm, 'username', array('class' => 'input-xlarge')); ?>       
         <?php echo $formEditUser->textFieldRow($userEditForm, 'record', array('class' => 'input-xlarge','disabled'=>'disabled')); ?>
         <?php echo $formEditUser->dropDownListRow($userEditForm, 'status', 
               array('Something ...', '1', '2', '3', '4', '5')); 
         ?>       
                
                
        <?php $this->endWidget(); ?>
<div/>


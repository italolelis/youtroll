<div id=""></div>
<div class="form-edit-user">
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


        <?php $this->endWidget(); ?>
<div/>
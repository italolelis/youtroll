lol
<div class="form-category">
    <?php
    /** @var BootActiveForm $form */
    $formEditCategory = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'addCategory', 'enableAjaxValidation' => false, 'enableClientValidation' => true,
        'action' => 'category',
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
        'htmlOptions' => array('class' => 'well'),
            ));
    ?> 

    <br>
    <?php echo $formEditCategory->textFieldRow($categoryForm, 'description', array('class' => 'input-xlarge', 'name' => 'categoryForm[cmc_ctg_description]')); ?>       
    <br>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit',)); ?>       

    <?php $this->endWidget(); ?>
</div>
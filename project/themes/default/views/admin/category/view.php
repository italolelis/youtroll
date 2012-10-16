<div id=""></div>
<div class="form-category">
    <?php
    /** @var BootActiveForm $form */
    $formEditCategory = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'editCategory', 'enableAjaxValidation' => false, 'enableClientValidation' => true,
        'action' => 'category/' . $model->ctg_id,
        'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
        'htmlOptions' => array('class' => 'well'),
            ));
    ?>    

    <br>
    <?php echo $formEditCategory->textFieldRow($categoryForm, 'name', array('class' => 'input-xlarge', 'name' => 'categoryForm[ctg_name]')); ?>       
    <br>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit',)); ?>       

    <?php $this->endWidget(); ?>
</div>


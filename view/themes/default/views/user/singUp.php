<section id="content">
    <h3 class="padd-top"><?=__('singUpForm')?></h3>
    <div class="con_border"></div>
    <?php
        $formSingUp = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'singUpForm',
            'action' => array('user/singUp'),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false, 'afterValidate' => 'js:submiAjaxForm'),
            'htmlOptions' => array('class' => 'tab_font')
        ));
    ?>
        <div class="defaultFormDiv" style="width: 25%">
            <div>
                <?php echo $formSingUp->textFieldRow($singUpForm, 'username', array('class' => 'defaultFormInput', 'style' => 'color: #fff')); ?>
                <?php echo $formSingUp->passwordFieldRow($singUpForm, 'password', array('class' => 'defaultFormInput', 'style' => 'color: #fff')); ?>
                <?php echo $formSingUp->textFieldRow($singUpForm, 'email', array('class' => 'defaultFormInput', 'style' => 'color: #fff')); ?>
            </div>
            <div>
                <?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType' => 'submit',
                        'label' => __('singUp'),
                        'type' => 'inverse',
                        'htmlOptions' => array(
                            'class' => 'right',
                            'style' => 'margin-right: -14px',
                        )
                    ));
                ?>
            </div>
        </div>
    <?php $this->endWidget(); ?>
</section>
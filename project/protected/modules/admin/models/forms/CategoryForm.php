<?php

class CategoryForm extends CFormModel
{

    public $name;

    public function rules()
    {
        return array(
            array('name', 'required', 'message' => HApp::t('categoryRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => HApp::t('nameCategory'),
        );
    }

}
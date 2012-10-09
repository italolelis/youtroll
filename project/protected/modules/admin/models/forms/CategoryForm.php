<?php

class CategoryForm extends CFormModel
{

    public $description;

    public function rules()
    {
        return array(
            array('description', 'required', 'message' => HApp::t('categoryRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => HApp::t('nameCategory'),
        );
    }

}
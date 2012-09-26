<?php

class CategoryForm extends CFormModel
{

    public $description;

    public function rules()
    {
        return array(
            array('description', 'required', 'message' => __('categoryRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'description' => __('nameCategory'),
        );
    }

}
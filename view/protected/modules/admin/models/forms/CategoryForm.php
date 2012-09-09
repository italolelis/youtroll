<?php

Yii::import('application.components.UserIdentity');

class CategoryForm extends CFormModel
{

    public $categoria;
    
    
    public function rules()
    {
        return array(
            array('name', 'required', 'message' => Yii::t('app', 'categoryRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username' => Yii::t('app', 'username'),
        );
    }

}
<?php

Yii::import('application.components.UserIdentity');

class CategoryForm extends CFormModel
{

    public $categoria;
    
    
    public function rules()
    {
        return array(
            array('categoria', 'required', 'message' => Yii::t('app', 'categoryRequired')),
            array('categoria', 'length', 'min' => '3', 'max' => '25', 'tooShort' => Yii::t('app', 'categoryInvalidShort'), 'tooLong' => Yii::t('app', 'categoryInvalidLong')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'categoria' => Yii::t('app', 'nameCategory'),
        );
    }

}
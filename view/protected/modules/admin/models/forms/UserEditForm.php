<?php

Yii::import('application.components.UserIdentity');

class UserEditForm extends CFormModel
{

    public $username;
    public $email;
    public $birthday;
    public $gender;
    public $bio;
    public $site;
    public $locale;
    public $record;
    public $status;
    
    public function rules()
    {
        return array(
            array('username', 'required', 'message' => Yii::t('app', 'usernameRequired')),
            array('email', 'required', 'message' => Yii::t('app', 'emailRequired')),
            array('email', 'email', 'message' => Yii::t('app', 'emailInvalid')),
            array('birthday', 'date', 'format'=>'dd-MM-yyyy', 'allowEmpty'=>false,'message' => Yii::t('app', 'dateInvalid')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username' => Yii::t('app', 'username'),
            'email' => Yii::t('app', 'emailUser'),
            'birthday' => Yii::t('app', 'birthday'),
            'bio' => Yii::t('app', 'bio'),
        );
    }

}
<?php

Yii::import('application.components.UserIdentity');

class SingUpForm extends CFormModel
{

    public $email;
    public $password;
    public $login;
    public $repeatPassword;
    
    public function rules()
    {
        return array(
            array('email', 'required', 'message' => Yii::t('app', 'emailRequired')),
            array('email', 'email', 'message' => Yii::t('app', 'emailInvalid')),
            array('login', 'required', 'message' => Yii::t('app', 'loginRequired')),
            array('password', 'length', 'min' => '3', 'max' => '25', 'tooShort' => Yii::t('app', 'usernameInvalid'), 'tooLong' => Yii::t('app', 'passwordInvalid')),
            array('password', 'compare', 'compareAttribute'=>'repeatPassword','message' => Yii::t('app', 'loginRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => Yii::t('app', 'emailUser'),
            'login' => Yii::t('app', 'login'),
            'password' => Yii::t('app', 'password'),
            'repeatPassword' => Yii::t('app','repeatPassword'),
        );
    }

}
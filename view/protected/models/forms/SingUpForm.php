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
            array('email', 'required', 'message' => __('emailInvalid')),
            array('email', 'email', 'message' => __('emailInvalid')),
            array('login', 'required', 'message'=> __('loginRequired')),
            array('password', 'length', 'min' => '3', 'max' => '25', 'tooShort' => __('passwordInvalid'), 'tooLong' =>__(' passwordInvalid')),
            array('password', 'compare', 'compareAttribute'=>'repeatPassword','message' =>__('loginRequired')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => __('emailUser'),
            'login' => __('login'),
            'password' => __('password'),
            'repeatPassword' => __('repeatPassword'),
        );
    }

}
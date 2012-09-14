<?php

class SingUpForm extends CFormModel
{
    public $login;
    public $password;
    public $email;
    
    public function rules()
    {
        return array(
            array('login, password, email', 'required', 'message' => __('required')),
            array('email', 'email', 'message' => __('emailInvalid')),
            array('login', 'length', 'min' => '3', 'max' => '25', 'tooShort' => __('tooShort'), 'tooLong' =>__(' tooLong')),
            array('password', 'length', 'min' => '8', 'max' => '25', 'tooShort' => __('tooShort'), 'tooLong' =>__('tooLong')),
            array('email', 'length', 'min' => '5', 'max' => '50', 'tooShort' => __('tooShort'), 'tooLong' =>__('tooLong')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => __('emailUser'),
            'login' => __('login'),
            'password' => __('password'),
        );
    }

}
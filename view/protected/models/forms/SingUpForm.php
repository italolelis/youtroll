<?php

class SingUpForm extends CFormModel
{
    public $username;
    public $password;
    public $email;
    
    public function rules()
    {
        return array(
            array('username, password, email', 'required', 'message' => __('required')),
            array('email', 'email', 'message' => __('emailInvalid')),
            array('username', 'length', 'min' => '3', 'max' => '25', 'tooShort' => __('tooShort'), 'tooLong' =>__(' tooLong')),
            array('password', 'length', 'min' => '8', 'max' => '25', 'tooShort' => __('tooShort'), 'tooLong' =>__('tooLong')),
            array('email', 'length', 'min' => '5', 'max' => '50', 'tooShort' => __('tooShort'), 'tooLong' =>__('tooLong')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => __('email'),
            'username' => __('username'),
            'password' => __('password'),
        );
    }

}
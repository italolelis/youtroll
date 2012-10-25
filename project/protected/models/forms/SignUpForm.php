<?php

class SignUpForm extends CFormModel
{
    public $email;
    public $password;
    
    public function rules()
    {
        return array(
            array('password, email', 'required', 'message' => HApp::t('requiredField')),
	    array('password', 'match', 'pattern' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/', 'message' => HApp::t('passwordStrength')),
            array('email', 'email', 'message' => HApp::t('emailInvalid')),
            array('password', 'length', 'min' => 8, 'max' => 25, 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t('tooLong')),
            array('email', 'length', 'min' => 5, 'max' => 50, 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t('tooLong')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => HApp::t('email'),
            'password' => HApp::t('password'),
        );
    }

}
<?php

class SignUpForm extends CFormModel
{
    public $username;
    public $password;
    public $email;
    
    public function rules()
    {
        return array(
            array('username, password, email', 'required', 'message' => HApp::t('requiredField')),
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => HApp::t('invalidCharacters')),
	    array('password', 'match', 'pattern' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/', 'message' => HApp::t('passwordStrength')),
            array('email', 'email', 'message' => HApp::t('emailInvalid')),
            array('username', 'length', 'min' => '3', 'max' => '25', 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t(' tooLong')),
            array('password', 'length', 'min' => '8', 'max' => '25', 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t('tooLong')),
            array('email', 'length', 'min' => '5', 'max' => '50', 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t('tooLong')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => HApp::t('email'),
            'username' => HApp::t('username'),
            'password' => HApp::t('password'),
        );
    }

}
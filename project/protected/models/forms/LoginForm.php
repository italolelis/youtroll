<?php

Yii::import('application.components.UserIdentity');

class LoginForm extends CFormModel
{

    public $email;
    public $password;
    public $rememberMe = false;

    public function rules()
    {
	return array(
	    array('email, password', 'required', 'message' => HApp::t('requiredField')),
	    array('email', 'email', 'message' => HApp::t('emailInvalid')),
            array('password', 'match', 'pattern' => Yii::app()->params['passwordStrength'], 'message' => HApp::t('passwordStrength')),
	    array('email', 'length', 'min' => 5, 'max' => 50, 'tooShort' => HApp::t('tooShort'), 'tooLong' =>HApp::t('tooLong')),
	    array('password', 'length', 'min' => 8, 'max' => 25, 'tooShort' => HApp::t('tooShort'), 'tooLong' => HApp::t('tooLong')),
            array('password', 'authenticate', 'message' => HApp::t('invalidAccess')),
	);
    }

    public function attributeLabels()
    {
	return array(
	    'email' => HApp::t('email'),
	    'password' => HApp::t('password'),
	    'rememberMe' => HApp::t('rememberMe'),
	);
    }

    public function getAttributeListErrors()
    {
	return 'password';
    }
    
    public function authenticate($attribute, $params)
    {
	if (!$this->hasErrors()) {
	    $identity = new UserIdentity($this->email, $this->password);

	    if ($identity->authenticate()) {
		Yii::app()->user->login($identity, $this->rememberMe ? 2592000 : 0); // 2592000 = 30 Dias
	    } else {
		$this->addError($attribute, $params['message']);
	    }
	}
    }

}
<?php

Yii::import('application.components.UserIdentity');

class LoginForm extends CFormModel
{

    public $username;
    public $password;
    public $rememberMe = false;

    public function rules()
    {
	return array(
	    array('username, password', 'required', 'message' => HApp::t('requiredField')),
	    array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u', 'message' => HApp::t('invalidCharacters')),
	    array('password', 'match', 'pattern' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/', 'message' => HApp::t('passwordStrength')),
	    array('username', 'length', 'min' => 3, 'max' => 25, 'tooShort' => HApp::t('tooShort'), 'tooLong' => HApp::t('tooLong')),
	    array('password', 'length', 'min' => 8, 'max' => 25, 'tooShort' => HApp::t('tooShort'), 'tooLong' => HApp::t('tooLong')),
	    array('password', 'authenticate', 'message' => HApp::t('invalidAccess')),
	);
    }

    public function attributeLabels()
    {
	return array(
	    'username' => HApp::t('username'),
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
	    $identity = new UserIdentity($this->username, $this->password);

	    if ($identity->authenticate()) {
		Yii::app()->user->login($identity, $this->rememberMe ? 2592000 : 0); // 2592000 = 30 Dias
	    } else {
		$this->addError($attribute, $params['message']);
	    }
	}
    }

}
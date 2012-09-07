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
            array('username', 'required', 'message' => Yii::t('app', 'usernameRequired')),
            array('password', 'required', 'message' => Yii::t('app', 'passwordRequired')),
            array('username', 'length', 'min' => '3', 'max' => '25', 'tooShort' => Yii::t('app', 'usernameInvalid'), 'tooLong' => Yii::t('app', 'usernameInvalid')),
            array('password', 'length', 'min' => '8', 'max' => '25', 'tooShort' => Yii::t('app', 'passwordInvalid'), 'tooLong' => Yii::t('app', 'passwordInvalid')),
            array('password', 'authenticate', 'message' => Yii::t('app', 'passwordAuthenticate')),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username' => Yii::t('app', 'username'),
            'password' => Yii::t('app', 'password'),
            'rememberMe' => Yii::t('app', 'rememberMe'),
        );
    }

    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $identity = new UserIdentity($this->username, $this->password);

            if ($identity->authenticate()) {
                Yii::app()->user->login($identity, $this->rememberMe ? 3600 * 24 * 30 : 0);
                
                return true;
            }
        }
        
        return false;
    }

}
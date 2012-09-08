<?php

function __($message, $dominio)
{
    return Yii::t($dominio, $message);
}

class Controller extends CController
{

    public $modelLogin;

    public function init()
    {
        $this->modelLogin = new LoginForm();

        Yii::app()->name = Yii::t('app', 'name');
        Yii::app()->language = 'pt_br'; // Alterar
    }

}
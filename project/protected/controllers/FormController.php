<?php

Yii::import('application.components.Controller');

class FormController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + login, signUp, sendImage',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'login' => 'application.controllers.form.LoginAction',
	    'sendImage' => 'application.controllers.form.SendImageAction',
	    'signUp' => 'application.controllers.form.SignUpAction',
	);
    }

}
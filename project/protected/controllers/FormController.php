<?php

Yii::import('application.components.Controller');

class FormController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + login, signUp',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'login' => 'application.controllers.form.LoginAction',
	    'signUp' => 'application.controllers.form.SignUpAction',
	);
    }

}
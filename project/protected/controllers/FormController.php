<?php

Yii::import('application.components.Controller');

class FormController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + login, signUp, sendPublication, search',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'login' => 'application.controllers.form.LoginAction',
	    'search' => 'application.controllers.form.SearchAction',
	    'sendPublication' => 'application.controllers.form.SendPublicationAction',
	    'signUp' => 'application.controllers.form.SignUpAction',
	);
    }

}
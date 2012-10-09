<?php

Yii::import('application.components.Controller');

class AjaxController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + loadView',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'loadView' => 'application.controllers.ajax.LoadViewAction',
	);
    }

}
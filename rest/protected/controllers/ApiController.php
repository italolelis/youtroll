<?php

Yii::import('application.components.Controller');

class ApiController extends Controller
{

    public function filters()
    {
	return array(
	    
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'error' => 'application.controllers.api.ErrorAction',
	    'index' => 'application.controllers.api.IndexAction',
	);
    }

    public function actionList()
    {
	HApp::throwException(501);
    }

    public function actionDelete()
    {
	HApp::throwException(501);
    }

    public function actionInsert()
    {
	HApp::throwException(501);
    }

    public function actionView()
    {
	HApp::throwException(501);
    }

    public function actionUpdate()
    {
	HApp::throwException(501);
    }

}
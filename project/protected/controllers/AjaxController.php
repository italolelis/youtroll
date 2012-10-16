<?php

Yii::import('application.components.Controller');

class AjaxController extends Controller
{

    public function filters()
    {
	return array(
	    'postOnly + deleteFile, loadView, uploadFile',
	);
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'deleteFile' => 'application.controllers.ajax.DeleteFileAction',
	    'loadView' => 'application.controllers.ajax.LoadViewAction',
	    'uploadFile' => 'application.controllers.ajax.UploadFileAction',
	);
    }

}
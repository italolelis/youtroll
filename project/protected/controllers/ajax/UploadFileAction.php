<?php

Yii::import("ext.EAjaxUpload.qqFileUploader");

class UploadFileAction extends CAction
{

    private $_ajaxUploadPath;

    function __construct()
    {
	$this->_init();
    }

    private function _init()
    {
	$this->_ajaxUploadPath = Yii::app()->basePath . '/../uploads/ajax/' . Yii::app()->session->sessionID . '/';

	if (!is_dir($this->_ajaxUploadPath)) {
	    mkdir($this->_ajaxUploadPath);
	}
    }

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
	    $ajaxUpload = new qqFileUploader(Yii::app()->params['allowedExtensions'], Yii::app()->params['maxSizeUpload']);

	    HApp::ajaxResponse($ajaxUpload->handleUpload($this->_ajaxUploadPath, true));
	}

	HApp::throwException(400);
    }

}
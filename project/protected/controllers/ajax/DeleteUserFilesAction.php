<?php

class DeleteUserFilesAction extends CAction
{

    private $_ajaxUploadPath;

    function __construct()
    {
	$this->_init();
    }

    private function _init()
    {
	$this->_ajaxUploadPath = Yii::app()->basePath . '/../uploads/ajax/' . Yii::app()->session->sessionID . '/';
    }

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
	    if (is_dir($this->_ajaxUploadPath) && scandir($this->_ajaxUploadPath) > 2) {
		$openPath = opendir($this->_ajaxUploadPath);

		while ($fileName = readdir($openPath)) {
		    if (is_file($this->_ajaxUploadPath . $fileName)) {
			unlink($this->_ajaxUploadPath . $fileName);
		    }
		}

		rmdir($this->_ajaxUploadPath);
	    }

	    HApp::ajaxResponse('true');
	}

	HApp::throwException(400);
    }

}
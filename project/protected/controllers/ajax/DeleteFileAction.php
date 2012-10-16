<?php

class DeleteFileAction extends CAction
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
	    $fileName = HApp::getRequest('POST', 'fileName');

	    if (!empty($fileName) && is_dir($this->_ajaxUploadPath)) {
		if (is_file($this->_ajaxUploadPath . $fileName)) {
		    if (unlink($this->_ajaxUploadPath . $fileName)) {
			HApp::ajaxResponse(Yii::t('app', "O arquivo <strong>{file}</strong> foi deletado com sucesso!", array('{file}' => $fileName)));
		    }

		    HApp::throwException(500, Yii::t('app', 'Não foi possível deletar o arquivo <strong>{file}</strong>. Tente novamente.', array('{file}' => $fileName)));
		}

		HApp::throwException(404, Yii::t('app', 'O arquivo <strong>{file}</strong> não foi encontrado.', array('{file}' => $fileName)));
	    }

	    HApp::throwException(403);
	}

	HApp::throwException(400);
    }

}
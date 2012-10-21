<?php

class SendImageAction extends CAction
{
    
    private $_ajaxUploadPath;
    private $_imagePath;

    function __construct()
    {
	$this->_init();
    }

    private function _init()
    {
	$this->_ajaxUploadPath = Yii::app()->basePath . '/../resources/ajaxUploads/' . Yii::app()->session->sessionID . '/';
        
        if (!is_dir($this->_ajaxUploadPath) || (is_dir($this->_ajaxUploadPath) && scandir($this->_ajaxUploadPath) < 2)) {
            $model = new SendImageForm();
            
            HModel::generatePerformAjaxValidation(get_class($model), $model->getAttributeListErrors(), HApp::t('imageUnselected'));
        }
        
        $openPath = opendir($this->_ajaxUploadPath);

        while ($fileName = readdir($openPath)) {
            if (is_file($this->_ajaxUploadPath . $fileName)) {
                $this->_imagePath = $fileName;
            }
        }
    }

    public function run()
    {
	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
            $model = new SendImageForm();
            $postModel = HApp::getRequest('POST', 'SendImageForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                $model->image_path = $this->_imagePath;
                
                if($model->validate()) {
                    $response = PersistenceServer::connect('publication', 'POST', $model->attributes);
//                    
//                    if($response === true) {
//                        HApp::ajaxResponse(array(
//                            'action' => 'openMenuOption',
//                            'menuOption' => 'login',
//                            'message' => array('type' => 'success', 'text' => HApp::t('signUpDone')),
//                        ));
//                    }
                    
                    $model->addErrors($response);
                    HModel::generatePerformAjaxErrors($model);
                }
                
                HModel::performAjaxValidation($model);
            }
            
	    HApp::throwException(400);
	}

	HApp::throwException(403);
    }

}
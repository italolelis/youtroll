<?php

class SendPublicationAction extends CAction
{
    
    private $_ajaxUploadPath;
    private $_imagePath;
    private $_userPath;

    function __construct()
    {
	$this->_init();
    }

    private function _init()
    {
	$this->_ajaxUploadPath = Yii::app()->basePath . '/../resources/ajaxUploads/' . Yii::app()->session->sessionID . '/';
        $this->_userPath = Yii::app()->basePath . '/../resources/img/user/' . Yii::app()->user->getName() . '/';
        
        if (!is_dir($this->_ajaxUploadPath) || (is_dir($this->_ajaxUploadPath) && scandir($this->_ajaxUploadPath) < 2)) {
            $model = new SendPublicationForm();
            
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
            $model = new SendPublicationForm();
            $postModel = HApp::getRequest('POST', 'SendPublicationForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                $model->image_path = $this->_imagePath;
                
                if($model->validate()) {
                    $response = PersistenceServer::connect('publication', 'POST', $model->attributes);
                    
                    if(is_int($response)) {
                        if(rename($this->_ajaxUploadPath . $this->_imagePath, $this->_userPath . $this->_imagePath)) {
                            HApp::ajaxResponse(array(
                                'action' => 'redirect',
                                'link' => Yii::app()->createAbsoluteUrl('', array('see' => HSecurity::urlEncode($response))),
                            ));
                        }
                        
                        // @todo Excluir aquivo do BD
                        
                        HApp::throwException(500);
                    }
                    
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
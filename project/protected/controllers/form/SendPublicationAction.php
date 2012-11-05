<?php

class SendPublicationAction extends CAction
{
    
    private $_publicationFile;
    private $_userPath;

    function __construct()
    {
	$this->_init();
    }

    private function _init()
    {
        $this->_userPath = Yii::app()->basePath . '/../resources/img/user/' . Yii::app()->user->getId() . '/';
     
        $ajaxUploadPath = Yii::app()->basePath . '/../resources/ajaxUploads/' . Yii::app()->session->sessionID . '/';
        
        if (!is_dir($ajaxUploadPath) || (is_dir($ajaxUploadPath) && scandir($ajaxUploadPath) < 2)) {
            $model = new SendPublicationForm();
            
            HModel::generatePerformAjaxValidation(get_class($model), $model->getAttributeListErrors(), HApp::t('imageUnselected'));
        }
        
        $openPath = opendir($ajaxUploadPath);

        while ($fileName = readdir($openPath)) {
            $imagePath = $ajaxUploadPath . $fileName;
            
            if (is_file($imagePath)) {
                $this->_publicationFile = Yii::app()->file->set($imagePath);
            }
        }
        
        if (!is_dir($this->_userPath)) {
	    mkdir($this->_userPath);
	}
    }

    public function run()
    {
	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest) {
            $model = new SendPublicationForm();
            $postModel = HApp::getRequest('POST', 'SendPublicationForm');

            if (!empty($postModel)) {
                $model->attributes = $postModel;
                
                $model->image_path = HSecurity::generateImageHash() . $this->_publicationFile->getExtension();
                
                if($model->validate()) {
                    $response = PersistenceServer::connect('publication', 'POST', $model->attributes);
                    
                    if(is_int($response)) {
                        $this->_publicationFile->resize(620);
                        
                        if(rename($this->_publicationFile->getRealPath(), $this->_userPath . $model->image_path)) {
                            HApp::ajaxResponse(array(
                                'action' => 'redirect',
                                'link' => Yii::app()->createAbsoluteUrl('', array('view' => HSecurity::urlEncode($response))),
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
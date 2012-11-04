<?php

class AssessAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            $review = HApp::getRequest('POST', 'like');
            
            if (!empty($review)) {
                $idPublication = HSecurity::urlDecode(HApp::getRequest('POST', 'publication'));
                
                $response = PersistenceServer::connect('publication', 'PUT', array('id' => $idPublication, 'like' => $review));
                var_dump($response);exit();
            }
            
            HApp::throwException(403);
	}

	HApp::throwException(400);
    }

}
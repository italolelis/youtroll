<?php

class AssessAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            $review = HApp::getRequest('POST', 'like');
            
            if (!empty($review)) {
                $idPublication = HSecurity::urlDecode(HApp::getRequest('POST', 'publication'));
                $review = $review === 'true' ? true : false;
                
                if(!Yii::app()->user->isGuest) {
                    $response = PersistenceServer::connect('publication', 'PUT', array('id' => $idPublication, 'like' => $review));
                    
                    if($response->status) {
                        HApp::ajaxResponse(array(
                            'action' => is_null($response->model->like) ? 'removeClass' : 'addClass',
                            'activeButton' => $review ? 'likeButton' : 'unlikeButton',
                            'inactiveButton' => !$review ? 'likeButton' : 'unlikeButton',
                            'class' => 'active',
                        ));
                    }
                    
                    HApp::throwException(500);
                }
                
                HApp::ajaxResponse(array(
                    'action' => 'showDiv',
                    'div' => 'guestUser',
                ));
            }
            
            HApp::throwException(403);
	}

	HApp::throwException(400);
    }

}
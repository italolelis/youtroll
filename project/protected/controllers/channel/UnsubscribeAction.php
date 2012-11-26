<?php

class UnsubscribeAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $idChannel = HApp::getRequest('POST', 'channel');
            
            if (!empty($idChannel)) {
                if(!Yii::app()->user->isGuest) {
                    $response = PersistenceServer::connect("inscription/$idChannel", 'DELETE');

                    if($response->status) {
                        HApp::ajaxResponse(array(
                            'action' => 'addClass',
                            'activeButton' => 'unsubscribeButton',
                            'inactiveButton' => 'subscribeButton',
                            'class' => 'displayNone',
                        ));
                    }
                    
                    HApp::throwException(500);
                }
            }
            
            HApp::throwException(403);
        }
        
        HApp::throwException(403);
    }

}
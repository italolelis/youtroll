<?php

class SubscribeAction extends CAction
{

    public function run()
    {
        if (Yii::app()->request->isAjaxRequest) {
            $idChannel = HApp::getRequest('POST', 'channel');
            
            if (!empty($idChannel)) {
                if(!Yii::app()->user->isGuest) {
                    $response = PersistenceServer::connect('inscription', 'POST', array('channel' => $idChannel));

                    if($response->status) {
                        HApp::ajaxResponse(array(
                            'action' => 'addClass',
                            'activeButton' => 'subscribeButton',
                            'inactiveButton' => 'unsubscribeButton',
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
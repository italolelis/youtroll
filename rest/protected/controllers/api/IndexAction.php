<?php

class IndexAction extends CAction
{

    public function run()
    {
	if (strpos(Yii::app()->request->getRequestUri(), 'index') !== false) {
	    HApp::throwException(404);
	}
        
        $flashMessages = Yii::app()->user->getFlashes();
        
        if($flashMessages) {
            foreach($flashMessages as $message) {
                HApp::ajaxResponse($message);
            }
        }

	HApp::ajaxResponse(HApp::t('welcome'));
    }

}
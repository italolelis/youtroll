<?php

class ErrorAction extends CAction
{

    public function run()
    {
	$error = Yii::app()->errorHandler->error;

	if (!empty($error)) {
	    $errorMessage = $error['errorCode'] === -1 ? $error['message'] : HApp::getMessageStatus($error['code']);
            
	    if ($this->controller->headers->application === 'youtroll') {
		HApp::ajaxResponse($errorMessage);
	    }
            
            Yii::app()->user->setFlash('error', $errorMessage);

	    $this->controller->redirect(Yii::app()->baseUrl);
	}

	HApp::throwException(403);
    }

}
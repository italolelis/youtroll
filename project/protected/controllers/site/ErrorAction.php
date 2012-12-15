<?php

class ErrorAction extends CAction
{

    public function run()
    {
	$error = Yii::app()->errorHandler->error;

	if (!empty($error)) {
	    $errorMessage = $error['errorCode'] === -1 ? $error['message'] : HApp::getMessageStatus($error['code']);

	    if (Yii::app()->request->isAjaxRequest) {
		HApp::ajaxResponse($errorMessage);
	    }

	    Yii::app()->user->setState('errorMessage', $errorMessage);
            
	    $this->controller->redirect(Yii::app()->getBaseUrl(true));
	}

	HApp::throwException(403);
    }

}
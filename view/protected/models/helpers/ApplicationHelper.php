<?php

class ApplicationHelper extends CFormModel
{

    public static function getStatusMessage($status)
    {
        return Yii::t('statusCodeMessages', $status);
    }

    public static function getRequest($requestType, $index)
    {
        switch (strtoupper($requestType)) {
            case 'GET':
                return Yii::app()->request->getQuery($index);
            case 'POST':
                return Yii::app()->request->getPost($index);
            case 'PUT':
                return Yii::app()->request->getPut($index);
            case 'DELETE':
                return Yii::app()->request->getDelete($index);
            default:
                ApplicationHelper::throwException(500);
        }
    }

    public static function throwException($status, $message = null, $errorCode = 0) {
        if(is_null($message)) {
	    $message = ApplicationHelper::getStatusMessage($status);
	} else {
	    $errorCode = -1;
	}
	
        if($message) {
            throw new CHttpException($status, $message, $errorCode);
        }
	
	ApplicationHelper::throwException(500);
    }
    
    public static function ajaxResponse($response) {
	if($response || $response === false) {
	    if (Yii::app()->request->isAjaxRequest) {
		if(is_array($response)) {
		    echo htmlspecialchars(CJSON::encode($response), ENT_NOQUOTES);
		} else {
		    echo $response;
		}
		
		Yii::app()->end();
	    }
	}
	
	ApplicationHelper::throwException(500);
    }

}
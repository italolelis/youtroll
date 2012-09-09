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

    public static function throwException($status)
    {
        $message = ApplicationHelper::getStatusMessage($status);

        if ($message) {
            throw new CHttpException($status, $message);
        } else {
            ApplicationHelper::throwException(500);
        }
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
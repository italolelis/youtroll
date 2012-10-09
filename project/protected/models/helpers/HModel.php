<?php

class HModel
{

    public static function performAjaxValidation($models)
    {
	if (Yii::app()->request->isAjaxRequest) {
	    HApp::ajaxResponse(CActiveForm::validate($models));
	}

	HApp::throwException(500);
    }

    public static function generatePerformAjaxValidation($className, $attribute, $errorMessage)
    {
	if (Yii::app()->request->isAjaxRequest) {
	    HApp::ajaxResponse(array($className . '_' . $attribute => array($errorMessage)));
	}

	HApp::throwException(500);
    }
    
    public static function generatePerformAjaxErrors($model)
    {
	if (Yii::app()->request->isAjaxRequest) {
            $arrayResponse = array();
            
            foreach($model->getErrors() as $attribute => $errorMessages) {
                $arrayResponse += array(get_class($model) . '_' . $attribute => $errorMessages);
            }
            
            HApp::ajaxResponse($arrayResponse);
	}

	HApp::throwException(500);
    }

}
<?php

class ErrorAction extends CAction
{

    public function run()
    {
        $error = Yii::app()->errorHandler->error;

        if ($error) {
            $errorMessage = ApplicationHelper::getStatusMessage($error['code']);

            if (Yii::app()->request->isAjaxRequest) {
                echo $errorMessage;

                Yii::app()->end();
            } else {
                $this->controller->render('error', array('errorMessage' => $errorMessage));
            }
        } else {
            ApplicationHelper::throwException(403);
        }
    }

}
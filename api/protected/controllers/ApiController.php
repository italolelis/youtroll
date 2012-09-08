<?php

class ApiController extends Controller
{

    public function actionList()
    {
        ApplicationHelper::throwException(403);
    }

    public function actionView()
    {
        ApplicationHelper::throwException(403);
    }

    public function actionCreate()
    {
        ApplicationHelper::throwException(403);
    }

    public function actionUpdate()
    {
        ApplicationHelper::throwException(403);
    }

    public function actionDelete()
    {
        ApplicationHelper::throwException(403);
    }

    public function actionError()
    {
        $error = Yii::app()->errorHandler->error;

        if ($error) {
            $errorMessage = ApplicationHelper::getStatusMessage($error['code']);

            echo $errorMessage;

            Yii::app()->end();
        } else {
            ApplicationHelper::throwException(403);
        }
    }

}
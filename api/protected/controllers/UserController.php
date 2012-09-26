<?php

Yii::import("ext.several.Bcrypt");

class UserController extends Controller
{

    public function actionList()
    {
        $users = User::model()->findAll();
        $message = array();

        if (!empty($users)) {
            $message = $users;
        }
        ApplicationHelper::ajaxResponse($message);
    }

    public function actionCreate()
    {   
        if (Yii::app()->request->isPostRequest) {
            $user = new User();
            $user->setAttributes($_POST);
            
            if (!$user->save()) {
                ApplicationHelper::ajaxResponse($user->getErrors());
            }
            
            ApplicationHelper::ajaxResponse('true');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $message = array();

            $user = User::model()->findByPk($id);
            $user->setAttributes($_POST);

            if ($user->save()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'User updated'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            echo CJSON::encode($message);
        }
    }

    public function actionView($id)
    {
        $message = array();

        $user = User::model()->find("usr_id = :id", array(":id" => $id));
        if ($user) {
            $message = $user;
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'The provided id isn\'t correct'
            );
        }
        echo CJSON::encode($message);
    }

    public function actionDelete($id)
    {
        if (Yii::app()->request->isDeleteRequest) {
            $user = User::model()->findByPk($id);
            $message = array();
            if ($user->delete()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'User deleted'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            echo CJSON::encode($message);
        }
    }

    public function actionLogin()
    {
        $return = false;

        $username = ApplicationHelper::getRequest('POST', 'username');
        $password = ApplicationHelper::getRequest('POST', 'password');

        if ($username && $password) {
            $user = User::model()->find('usr_username = :username', array(':username' => $username));

            if ($user) {
                if (Bcrypt::check($password, $user->usr_password)) {
                    $return = true;
                }
            }
        }

        echo CJSON::encode($return);
    }

}
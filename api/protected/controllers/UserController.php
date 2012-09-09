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
            $message = array();

            $user = new User();
            $user->setAttributes($_POST['User']);

            if ($user->save()) {
                $message = array(
                    'status' => 'success',
                    'message' => 'User created'
                );
            } else {
                $message = array(
                    'status' => 'error',
                    'message' => 'An unexpected error ocurred'
                );
            }
            return CJSON::encode($message);
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::app()->request->isPostRequest) {
            $message = array();

            $user = User::model()->findByPk($id);
            $user->setAttributes(ApplicationHelper::getRequest("POST", "User"));

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
            return CJSON::encode($message);
        }
    }

    public function actionView($id)
    {
        $message = array();

        $user = User::model()->findByPk($id);

        if ($user) {
            $message = $user;
        } else {
            $message = array(
                'status' => 'error',
                'message' => 'The provided id isn\'t correct'
            );
        }
        return CJSON::encode($message);
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
            return CJSON::encode($message);
        }
    }

    public function actionLogin()
    {

        $username = ApplicationHelper::getRequest('POST', 'username');
        $password = ApplicationHelper::getRequest('POST', 'password');

        if ($username && $password) {
            $user = User::model()->find('usr_username = :username AND usr_password = :password', array(':username' => $username, 'password' => Bcrypt::hash($password)));
        }

        echo CJSON::encode(isset($user));
    }

}
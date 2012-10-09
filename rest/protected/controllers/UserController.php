<?php

Yii::import('application.components.Controller');

class UserController extends Controller
{

    public function init()
    {
        parent::init();

        $this->model = new User();
    }

    public function filters()
    {
        return array(
            'postOnly + login',
        );
    }

    public function actions()
    {
	return array(
	    // Ações da Aplicação
	    'login' => 'application.controllers.user.LoginAction',
	);
    }
    
    public function actionList()
    {
        HApp::ajaxResponse($this->model->findAll(), $this->model->getAttributesPrefix());
    }
    
    public function actionInsert()
    {
        if (Yii::app()->request->isPostRequest) {
            $this->model->setAttributesWithoutPrefix($_POST);
            
            if (!$this->model->save()) {
                HApp::ajaxResponse($this->model->getErrors(), $this->model->getAttributesPrefix());
            }

            HApp::ajaxResponse('true');
        }
    }
    
    public function actionView($id)
    {
        $this->model = User::model()->find("usr_id = :id", array(":id" => $id));
        
        if(!$this->model) {
            HApp::ajaxResponse(array('status' => 'error', 'message' => HApp::t('idUnknown')));
        }
        
        HApp::ajaxResponse($this->model->attributes, $this->model->getAttributesPrefix());
    }
    
    // @TODO - O código abaixo não foi editado
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

}
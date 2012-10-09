<?php

Yii::import("application.components.Controller");
Yii::import("application.components.PersistenceServer");

class UserController extends Controller
{

    public function actionList()
    {
        $this->render('index', array('model' => PersistenceServer::connect('user', 'GET')));
    }

    public function actionView($id)
    {   
        $response = PersistenceServer::connect("user/$id", 'GET', null, null, null, true);
                
        $userEditForm = new UserEditForm();
        $userEditForm->attributes = $response;
        
        $this->renderPartial('view', array('userEditForm' => $userEditForm));
    }
// @TODO - O código abaixo não foi editado
    public function actionUpdate($id)
    {
        $response = PersistenceServer::connect("user", 'POST', array('id' => $id), null, null);
        
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user/" . $id, "POST", $_POST['UserEditForm']);
        echo CJSON::encode($messages);
    }

    public function actionDelete($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user", "DELETE", array($id));
        echo CJSON::encode($messages);
    }

}
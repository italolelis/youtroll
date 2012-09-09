<?php

Yii::import("application.components.PersistenceServer");

class UserController extends Controller
{

    public $layout = "main";

    public function actionList()
    {
        $persistent = new PersistenceServer();

        $users = $persistent->connect("user", "GET");

        $this->render('index', array(
            'model' => $users
        ));
    }

    public function actionView($id)
    {
        $persistent = new PersistenceServer();
        $user = $persistent->connect("user", "GET", array($id));
        
        
        $userEditForm = new UserEditForm();
        $this->renderPartial('view',array('userEditForm'=>$userEditForm)); 
        
    }

    public function actionUpdate($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user", "POST", array($id));
        echo CJSON::encode($messages);
    }

    public function actionDelete($id)
    {
        $persistent = new PersistenceServer();
        $messages = $persistent->connect("user", "DELETE", array($id));
        echo CJSON::encode($messages);
    }

}
<?php

Yii::import("application.components.PersistenceServer");

class UserController extends Controller
{

    public $layout = "main";

    public function actionIndex()
    {
        $persistent = new PersistenceServer();
        $users = $persistent->connect("user", "GET");
        //var_dump($users);exit();
        $this->render('index', array(
            'model' => $users
        ));
    }

}
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

        $this->render('view', array(
            'model' => $user
        ));
    }

}
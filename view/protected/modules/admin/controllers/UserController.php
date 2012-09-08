<?php

class UserController extends Controller
{

    public $layout = "main";

    public function actionIndex()
    {
        $persistent = new PersistenceServer();
        $users = $persistent->connect("user", "GET");
        $this->render('index', array(
            'model' => $users
        ));
    }

    public function actionLogin()
    {
        
    }

}
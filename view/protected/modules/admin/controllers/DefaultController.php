<?php

class DefaultController extends Controller
{

    public $layout = "main";

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = "login";
        $this->render("login");
    }

}
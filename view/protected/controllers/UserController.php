<?php

class UserController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + login',
        );
    }

    public function accessRules()
    {
        return array(
            
        );
    }
    
    public function actions()
    {
        return array(
            'login' => 'application.controllers.user.LoginAction',
            'logout' => 'application.controllers.user.LogoutAction',
        );
    }

}
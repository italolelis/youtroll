<?php

Yii::import('application.components.Controller');

class UserController extends Controller
{

    public function filters()
    {
        return array(
        );
    }
    
    public function actions()
    {
        return array(
            'controlPanel' => 'application.controllers.user.ControlPanelAction',
            'login' => 'application.controllers.user.LoginAction',
            'logout' => 'application.controllers.user.LogoutAction',
            'signUp' => 'application.controllers.user.SignUpAction',
        );
    }

}
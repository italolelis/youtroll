<?php

class ApiController extends Controller
{

    public function actionLogin()
    {
        $username = ApplicationHelper::getRequest('POST', 'username');
        $password = ApplicationHelper::getRequest('POST', 'password');
        
        $user = User::find('username = :username AND password = :password', array(':username' => $username, 'password' => $password));
        
        if(isset($user)) {
            ApplicationHelper::ajaxResponse(true);
        }
        
        ApplicationHelper::ajaxResponse(false);
    }

}
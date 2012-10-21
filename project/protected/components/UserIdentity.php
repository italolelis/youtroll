<?php

Yii::import('application.components.PersistenceServer');

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;

    public function authenticate()
    {
	$authenticate = PersistenceServer::connect('login', 'POST', null, $this->username, $this->password);
        
        if(is_int($authenticate)) {
            $this->_id = $authenticate;
        }
        
        return $authenticate;
    }

    public function getId()
    {
	return $this->_id;
    }

}
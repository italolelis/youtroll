<?php

Yii::import('ext.rest-curl.RESTClient');

class PersistenceServer extends CComponent
{

    private $_uri;
    private $_verb;
    private $_params;

    public function connect($uri, $verb, $params = null)
    {
        $this->_uri = $uri;
        $this->_verb = strtoupper($verb);
        $this->_params = $params;

        $rest = new RESTClient();

        $rest->initialize(array('server' => Yii::app()->params['persistenceServer']));

        switch ($this->_verb) {
            case 'DELETE':
                $response = $rest->delete($this->_uri, $this->_params);
                break;
            case 'GET':
                $response = $rest->get($this->_uri, $this->_params);
                break;
            case 'POST':
                $response = $rest->post($this->_uri, $this->_param);
                break;
            case 'PUT':
                $response = $rest->put($this->_uri, $this->_params);
                break;
            default:
                return false;
        }

        return CJSON::decode($response, false);
    }

}
<?php

Yii::import('ext.rest-curl.RESTClient');

class PersistenceServer extends CComponent
{

    public static function connect($uri, $verb, $params = array(), $username = null, $password = null, $returnArray = false)
    {
        $config['server'] = Yii::app()->params['persistenceServer'];

        if (!is_null($username) && !is_null($password)) {
            $config['http_auth'] = 'Basic';
            $config['http_user'] = $username;
            $config['http_pass'] = $password;
        }

        $rest = new RESTClient();

        $rest->initialize($config);
        $rest->set_header('application', 'youtroll');

        switch (strtoupper($verb)) {
            case 'DELETE':
                $response = $rest->delete($uri, $params);
                break;
            case 'GET':
                $response = $rest->get($uri, $params);
                break;
            case 'POST':
                $response = $rest->post($uri, $params);
                break;
            case 'PUT':
                $response = $rest->put($uri, $params);
                break;
            default:
                return false;
        }

//        var_dump($response);exit();

        if ($rest->status() !== 200) {
            HApp::throwException($rest->status());
        }

        return CJSON::decode($response, $returnArray);
    }

}
<?php

// Yii::setPathOfAlias('local','path/to/local-folder');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'defaultController' => 'site',
    'sourceLanguage' => 'en_us',
    'preload' => array(
        'log',
    ),
    
    'import' => array(
        'application.components.Controller',
        'application.models.forms.*',
        'application.models.helpers.*',
    ),
    'modules' => array(
        //*
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'qwerty',
            'ipFilters' => array('*'),
        ),
    //*/
    ),
    'components' => array(
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
            'rules' => array(
                array('api/list', 'pattern' => 'api/<model:\w+>', 'verb' => 'GET'),
                array('api/view', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'GET'),
                array('api/update', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'PUT'),
                array('api/delete', 'pattern' => 'api/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('api/create', 'pattern' => 'api/<model:\w+>', 'verb' => 'POST'),
            // Para outros controladores
//				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        
        'user' => array(
            'allowAutoLogin' => true,
        ),
        
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=youtroll_db',
            'username' => 'root',
            'password' => '',
        ),
        
        'widgetFactory' => array(
            'widgets' => array(
            ),
        ),
        
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    
    'params' => require(dirname(__FILE__) . '/params.php'),
);
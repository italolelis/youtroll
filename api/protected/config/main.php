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
        'application.models.tables.*',
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
            'errorAction' => 'api/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
            'rules' => array(
                array('<controller>/list', 'pattern' => '<controller:\w+>', 'verb' => 'GET'),
                array('<controller>/view', 'pattern' => '<controller:\w+>/<id:\d+>', 'verb' => 'GET'),
                array('<controller>/update', 'pattern' => '<controller:\w+>/<id:\d+>', 'verb' => 'PUT'),
                array('<controller>/delete', 'pattern' => '<controller:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('<controller>/create', 'pattern' => '<controller:\w+>', 'verb' => 'POST'),
                // Para outros controladores
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
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
<?php

function __($message, $dominio = "app")
{
    return Yii::t($dominio, $message);
}

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'theme' => 'default',
    'defaultController' => 'site',
    'sourceLanguage' => 'en_us',
    'preload' => array(
        'log',
        'bootstrap',),
    'import' => array(
        'application.components.Controller',
        'application.models.forms.*',
        'application.models.helpers.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'qwerty',
            'ipFilters' => array('*'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
        'admin'
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
                array('admin/<controller>/list', 'pattern' => 'admin/<controller:\w+>', 'verb' => 'GET'),
                array('admin/<controller>/view', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'GET'),
                array('admin/<controller>/update', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'POST'),
                array('admin/<controller>/delete', 'pattern' => 'admin/<controller:\w+>/<id:\d+>', 'verb' => 'DELETE'),
                array('admin/<controller>/create', 'pattern' => 'admin/<controller:\w+>', 'verb' => 'POST'),
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ),
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
        'user' => array(
            'allowAutoLogin' => true,
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
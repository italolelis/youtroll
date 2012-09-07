
<?php

// Yii::setPathOfAlias('local','path/to/local-folder');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'theme' => 'default',
    'defaultController' => 'site',
    'sourceLanguage' => 'en_us',
    'preload' => array(
<<<<<<< HEAD
        'log', 'bootstrap',
=======
        'log',
        'bootstrap',
>>>>>>> Login(Sent to finish Fabiano)
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
<<<<<<< HEAD
            'ipFilters' => array('*'), 'generatorPaths' => array(
=======
            'ipFilters' => array('*'),
            'generatorPaths'=>array(
>>>>>>> Login(Sent to finish Fabiano)
                'bootstrap.gii',
            ),
        ),
        'admin'
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
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ),
        ),
<<<<<<< HEAD
        'bootstrap' => array(
            'class' => 'application.extensions.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
=======
        
        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
         ),
        
>>>>>>> Login(Sent to finish Fabiano)
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
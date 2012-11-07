<?php

return array(
    'adminEmail' => 'admin@youtroll.com.br',
    'persistenceServer'=> 'http://localhost/youtroll/rest/',
    
    'allowedExtensions' => array('jpg', 'gif', 'png'),
    'maxSizeUpload' => 1048576, // 1MB
    'maxPublications' => 12,
    
    'defaultLanguage' => 'pt_br',
    'supportedLanguages' => array(
        'pt_br',
    ),
    
    'systemListeners' => array(
	'listener@youtroll.com.br',
    ),
);
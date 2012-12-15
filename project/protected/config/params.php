<?php

return array(
    'adminEmail' => 'admin@youtroll.com.br',
    'persistenceServer'=> 'http://localhost/youtroll/rest/',
    
    'fb_id' => '421726281227767',
    'fb_secret' => 'a1601906b0b78180ebc7654bf0ad332a',
    'disqus_shortname' => 'ytroll',
    
    'allowedExtensions' => array('jpg', 'gif', 'png'),
    'maxSizeUpload' => 1048576, // 1MB
    'maxPublications' => 12,
    'maxRelatedPublications' => 5,
    'maxSearchPublications' => 30,
    'maxCategoriesPublications' => 30,
    
    'passwordStrength' => '/^(?=.*(\d|\W)).{8,}$/',
    
    'defaultLanguage' => 'pt_br',
    'supportedLanguages' => array(
        'pt_br',
    ),
    
    'systemListeners' => array(
	'listener@youtroll.com.br',
    ),
    
    'team' => array(
        'Fabiano Carneiro de Oliveira',
        'Ítalo Lelis de Vietro',
        'João de Araújo Pessoa Neto',
        'José Rodolfo Almeida',
    ),
);
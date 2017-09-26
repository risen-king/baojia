<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db'=> require(__DIR__ . '/components/db.php'),
        'i18n' =>require(__DIR__ . '/components/i18n.php'),
        'mailer' => require(__DIR__ . '/components/mailer.php'),
        'sms'=>    require(__DIR__ . '/components/sms.php'),
        
  
 
    ],
];

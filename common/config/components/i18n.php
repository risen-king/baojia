<?php
return [
    'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app/app.php',
                        'app/error' => 'app/error.php',
                    ],
                ],

                'backend*' => [
                   'class' => 'yii\i18n\PhpMessageSource',
                   'basePath' => '@backend/messages',
                   //'sourceLanguage' => 'en-US',
                   'fileMap' => [
                       'backend' => 'backend/backend.php',
                       'backend/error' => 'backend/error.php',
                   ],
               ],

                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'common' => 'common.php',
                        'common/category'=>'category.php',
                        'common/goods'=>'goods.php',
                        'common/user'=>'user.php',
                        'common/money'=>'money.php',
                    ],
                ],
               'user'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                   
                ],
               'money'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                   
                ],
        
           
    ]
];
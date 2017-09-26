<?php

return  [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'ahcj_11@163.com',
                'password' => '123456cyq',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig'=>[  
                'charset'=>'UTF-8',  
                'from'=>['ahcj_11@163.com'=>'admin']  
            ]
    ];
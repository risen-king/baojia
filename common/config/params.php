<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    
    
    'payment'=>[
        'wxpay'=>[
            'name'=>'wxpay',
            'label'=>'微信支付',
            'fee'=>0,
            'thumb'=>'http://demo.destoon.com/v6.0/api/pay/weixin/logo.gif'
        ],
        'bank'=>[
            'name'=>'bank',
            'label'=>'网银在线',
            'fee'=>0,
            'thumb'=>'http://demo.destoon.com/v6.0/api/pay/chinabank/logo.gif'
        ]
    ],
];

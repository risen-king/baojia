<?php

return [
 'enablePrettyUrl' => true,// 启用美化URL
 'enableStrictParsing' => true, // 是否执行严格的url解析
 'showScriptName' => false,// 在URL路径中是否显示脚本入口文件

 'rules' => [
     [
         'class' => 'yii\rest\UrlRule',
         'controller' => 'v1/user',
         'extraPatterns' => [
               'OPTIONS,GET,POST   login'  => 'login',
               'OPTIONS,GET        logout' => 'logout',
               'OPTIONS,GET,POST   signup' => 'signup',
               'OPTIONS,POST   avatar' => 'upload',
               'OPTIONS,GET    profile'=> 'profile',
               'OPTIONS,POST   upload' => 'upload',

               //'OPTIONS,PUT,PATCH  update' => 'update',
         ]
     ],
     [
        'class' => 'yii\rest\UrlRule',
        'controller' =>  'v1/article',
        'extraPatterns' => [
             'OPTIONS,GET  search/<keyword>' => 'search',
        ]
     ],

     [
        'class' => 'yii\rest\UrlRule',
        'controller' =>  'v1/product',
        'extraPatterns' => [
            'OPTIONS,GET  search/<word>' => 'search',
            'OPTIONS,GET  prices/<word>' => 'prices',
        ]

     ],
     [
          'class' => 'yii\rest\UrlRule',
          'controller' => 'product-price',
          'extraPatterns' => [
              'OPTIONS,GET  index/<symbol>' => 'index',
          ]
     ],


 ],
];
       




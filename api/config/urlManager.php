<?php

return [
         'enablePrettyUrl' => true,// 启用美化URL  
         'enableStrictParsing' => true, // 是否执行严格的url解析  
         'showScriptName' => false,// 在URL路径中是否显示脚本入口文件  
        
         'rules' => [
                     [
                             'class' => 'yii\rest\UrlRule',
                             'controller' => [
                                        'v1/user',//使用单数形式
                                        'v1/news'
                              ]
                    ]
            
         ],
];
           
 
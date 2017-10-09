<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name'=>'沙石报价管理系统',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'zh-CN',
    'modules' => [
          "admin" => [
                    "class" => "mdm\admin\Module",
                    'layout' => 'left-menu',
                    'mainLayout' => '@app/views/layouts/main.php',
                    'controllerMap' => [
                             'assignment' => [
                                      'class' => 'mdm\admin\controllers\AssignmentController',
                                    // 'userClassName' => 'backend\models\AdminUser', 
                                ]
                     ],
          ],
        
//          'user' => [
//                'class' => 'dektrium\user\Module',
//                'enableUnconfirmedLogin' => true,
//                'admins' => ['ahcj_11'],
//              
//          ],
         //'rbac' => 'dektrium\rbac\RbacWebModule',
        
        ],
    'components' => [
       
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\AdminUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
        ],
        
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
      
        
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        
 
    ],
    
    'params' => $params,
    
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'*',
            'site/login',

        ]
    ],
    
];

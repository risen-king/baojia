<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;




use yii\helpers\ArrayHelper;
use common\helper\Util;



use api\models\LoginForm;
use api\models\SignupForm;
use api\models\UploadForm;


class UserController extends \yii\rest\ActiveController
{
         public $modelClass = 'api\models\User';
         
         public function behaviors() 
         {
                    return ArrayHelper::merge (parent::behaviors(), [ 
                             'authenticator' => [ 
                                        'class' =>HttpBasicAuth::className() ,
                                        'optional' => [
                                                 
                                                  'login',
                                                  'signup',
                                                  'upload',
                                            
                                        ],
                             ] 
                    ] );
         }
         
         public function actionLogin(){
                    
                    $model = new LoginForm;
                    
                    $model->setAttributes( Yii::$app->request->post() );
                 
                    if ( $model->login() ) 
                    {
                              $user = Yii::$app->user->identity;
                          
                              return Util::success( [
                                        'username'=>$user->username,
                                        'email'=>$user->email,
                                        'access_token'=>$user->access_token,
                              ] ); 
                             
                    } else {
     
                              return Util::error( $model->getErrors() );
                    }
         }
         
          /*
         * 注册新用户
         */
        public function actionSignup(){

              $model = new SignupForm();
              
              $model->setAttributes(Yii::$app->request->post());
               
              if( $model->signup() ){
                   
                    return Util::success( [
                            'username'=>$model->username,
                            'email'=>$model->email
                        ] );
                    
              }else{
                   
                   return Util::error( $model->getErrors() );
 
              }
              
        
         }
        
         
         /**
        * 获取用户信息
        */
       public function actionUserProfile ($token)
       {
                // 到这一步，token都认为是有效的了
                // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
                $user = User::findIdentityByAccessToken($token);
                return [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                ];
       }
       
        
       public function actionUpload()
        {
            
           $model = new UploadForm();
         
            $result = $model->upload() ;
           

            if ( $result ) {
                       // 文件上传成功
                       return Util::success(  $result );  
            }else{
                        return Util::error( $model->getErrors() );
            }

         }
}

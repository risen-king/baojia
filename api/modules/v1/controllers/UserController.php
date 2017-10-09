<?php

namespace api\modules\v1\controllers;

use api\models\User;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;



use yii\filters\Cors;

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
         $behaviors = parent::behaviors();

         $behaviors['corsFilter'] = [
             'class' => Cors::className(),
             'cors' => [
                 'Origin' => ['*'],
                 'Access-Control-Request-Method' => ['GET','POST','PUT'],
                 'Access-Control-Request-Headers'=>['*']
             ],
         ];


//         $behaviors['authenticator'] = [
//             'class' => HttpBasicAuth::className() ,
//             'optional' => [
//                 'login',
//                 'signup',
//                 'upload',
//
//             ],
//         ];

         return  $behaviors;
     }

     public function actionLogin(){

            $model = new LoginForm;

            $model->setAttributes( Yii::$app->request->post() );

            if ( $model->login() )
            {
                  $user = Yii::$app->user->identity;
                  unset($user->password_hash);

                  return Util::success($user);

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

          if( $user = $model->signup() ){

                return Util::success($user);

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

            $token = \Yii::$app->request->headers->get('Authorization');

            $user = \api\models\User::findIdentityByAccessToken($token);
            if($user){
                $user->avatar = $result;
                $user->save(false);
            }



           // 文件上传成功
           return Util::success(  $result );


        }else{
            return Util::error( $model->getErrors() );
        }

     }
}

<?php

namespace api\modules\v1\controllers;

use api\models\User;
use common\helper\Upload;
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
//use api\models\UploadForm;

use api\modules\v1\controllers\BaseController  as ActiveController;


class UserController extends ActiveController
{
     public $modelClass = 'api\models\User';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];


     //用户access_token
     public $token;

     public function init()
     {
         parent::init();

         $authHeader = \Yii::$app->request->getHeaders()->get('Authorization');
         $this->token =  $authHeader ;


         //die;
     }

//     public function behaviors()
//     {
//         $behaviors = parent::behaviors();
//
//
//
//
////         $behaviors['authenticator'] = [
////             'class' => HttpBasicAuth::className() ,
////             'optional' => [
////                 'login',
////                 'signup',
////                 'upload',
////
////             ],
////         ];
//
//         return  $behaviors;
//     }


    public function actionUpload(){

        $baseUri =  Yii::$app->request->post('avatar');

        if(\Yii::$app->request->isOptions || !$baseUri){
            return ;
        }


        try{
            $result = Upload::uploadBase64($baseUri);

            $modelClass = $this->modelClass;
            $user = $modelClass::findIdentityByAccessToken($this->token);
            $user->avatar = $result;
            $user->save(false);

            return Util::success(  $result );


        }catch (\Exception $e){

            throw $e;
            //echo $e->getMessage();

        }

    }

    public function actionUploadForm() {

        $model = new UploadForm();
        $result = $model->upload() ;


        if ( $result ) {

            $modelClass = $this->modelClass;
            $user = $modelClass::findIdentityByAccessToken($this->token);

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



     public function actionLogin(){

        $model = new LoginForm;

        $model->setAttributes( Yii::$app->request->post() );

        if ( $model->login() )
        {
              $user = Yii::$app->user->identity;
              unset($user->password_hash);

              return Util::success($user);
              //return $user;

        } else {
            //throw new \Exception( current(current($model->getErrors())) );

            return Util::error( current(current($model->getErrors())) );
        }
     }


    public function actionLogout(){

        $modelClass = $this->modelClass;

        $user = $modelClass::findIdentityByAccessToken($this->token);
        $user->access_token = '';
        $user->save(false);

        return Util::success('成功退出');


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
   public function actionUserProfile ()
   {
        // 到这一步，token都认为是有效的了
        // 下面只需要实现业务逻辑即可，下面仅仅作为案例，比如你可能需要关联其他表获取用户信息等等
        $user = User::findIdentityByAccessToken($this->token);
        return [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
        ];
   }

    public function actionSms(){

        $smsConfig = \Yii::$app->params['sms']['aliyun'];
        $sms = new \common\component\dysms\Sms($smsConfig['accessKeyId'],$smsConfig['accessKeySecret']);

        $phoneNumber = $smsConfig['phoneNumber'];
        $code = Util::generateNumber(6);
        $params = [
            "code"=> $code,
            "product"=>"productName"
        ];


//        $response = $sms->sendSms(
//            $smsConfig['signName'],
//            $smsConfig['templateCode'],
//            $phoneNumber,
//            $params
//
//        );

        return Util::success($code);

        //print_r($response);


    }


}

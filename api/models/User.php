<?php

namespace api\models;

use Yii;
use yii\web\UnauthorizedHttpException;

use common\models\User as BaseUser;

 
class User extends BaseUser
{
    /**
    * 生成 access_token
    */
     # 生成access_token  
    public function generateAccessToken()  
    {  
           $this->access_token = Yii::$app->security->generateRandomString(). '_' . time();
    }
         
    /*
       * 移除access_token 是否过期
       *  @param string $token
       *  @return  bool
       */
      public  function removeAccessToken(){

            $this->access_token = '';
            $this->save();

            return  $this;
      }
       
    /*
      * 检验access_token 是否过期
      *  @param string $token
      *  @return  bool
      */
     public static function checkAccessToken($token){
            if( empty($token) ){
                     return false;
             }

           $timestamp = (int) substr($token, strrpos($token, '_') + 1);

           $expire =  isset ( Yii::$app->params['user.accessTokenExpire'] ) && !empty( Yii::$app->params['user.accessTokenExpire'] ) ? Yii::$app->params['user.accessTokenExpire'] : 3600;

           return $timestamp + $expire >= time();
     } 
         
         
     /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

         if(  !static::checkAccessToken($token) ){
                throw  new  UnauthorizedHttpException('access_token is invalid');
         }
        
         return static::findOne(['access_token' => $token]);
    }


     
}

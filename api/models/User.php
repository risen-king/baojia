<?php

namespace api\models;

use Yii;
use yii\web\UnauthorizedHttpException;

use common\models\User as BaseUser;

 
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['username','nickname','email','mobile','avatar'], 'safe'],

            'mobileRequired' => ['mobile', 'required', 'message' => '手机不可以为空'],
            'mobileLength' => ['mobile', 'string', 'min' => 2, 'max' => 13],
            'mobileUnique' => [
                'mobile',
                'unique',
                'message' => '用户名已存在.',
                'targetClass' => '\api\models\User',
                'when'=> function($model, $attribute){
                    // 邮箱不为空时候检查唯一性
                    //return  !!$attribute;
                    return false;
                }
            ],
            'mobileTrim'     => ['mobile', 'trim'],


            //'emailRequired' => ['email', 'required', 'message' => '邮箱不可以为空'],
            //'emailTrim'     => ['email', 'trim'],
            //'emailLength' => ['email', 'string', 'min' => 2, 'max' => 13],
//            'emailUnique' => [
//                'email',
//                'unique',
//                'message' => '邮箱已存在.',
//                'targetClass' => '\api\models\User',
//                'when'=> function($model, $attribute){
//                    // 邮箱不为空时候检查唯一性
//                    return  !!$attribute;
//                    //return false;
//                }
//            ],

        ];
    }

    // 明确列出每个字段，适用于你希望数据表或
    // 模型属性修改时不导致你的字段修改（保持后端API兼容性）
    public function fields()
    {

        return [
            'id',
            'username',
            'nickname',

            'email',
            'mobile',
            'money',
            'credit',
            'avatar',
            'access_token',


        ];
    }
    /**
    * 生成 access_token
    */
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

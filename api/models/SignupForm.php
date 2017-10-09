<?php

namespace api\models;

use common\helper\Password;
use yii\base\Model;
use api\models\User;

/**
 * SignUpForm
 */
class SignupForm extends Model
{
      public $username;
      public $email;
      public $mobile;
      public $password;


        /**
        * @inheritdoc
        * 对数据的校验规则
        */
      public function rules()
      {
           return [

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



               'passwordRequired' => ['password', 'required', 'message' => '密码不可以为空'],
               'passwordLength'   => ['password', 'string', 'min' => 6, 'tooShort' => '密码至少填写6位'],

               
           ];
      }
       
      
       
       /**
        * Signs user up.
        *
        * @return User|null the saved model or null if saving fails
        */
       public function signup(){
   
           // 调用validate方法对表单数据进行验证，验证规则参考上面的rules方法
            if (  !$this->validate() ){
                return false;
            }
           
            // 实现数据入库操作
            $user = new User;
            $user->mobile = $this->mobile;

            $user->username = Password::generate(6);

            // 设置密码
            $user->setPassword($this->password);

             // 生成 "remember me" 认证key
            $user->generateAuthkey();

            // save(false)的意思是：不调用 User 的 rules 再做校验并实现数据入库操作
             // 这里这个 false 如果不加，save底层会调用  User 的rules方法再对数据进行一次校验，
             // 因为我们上面已经调用Signup的rules校验过了，这里就没必要在用 User 的 rules 校验了
            $result = $user->save(false);
            if($result){

                unset($user->password_hash);
                return $user;

            }else{
                return false;
            }


          
       }

}
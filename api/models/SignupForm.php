<?php

namespace api\models;

use yii\base\Model;
use api\models\User;

/**
 * SignUpForm
 */
class SignupForm extends Model
{
          public $username;
          public $email;
          public $password;
        
    
        /**
        * @inheritdoc
        * 对数据的校验规则
        */
       public function rules()
       {
           return [
               // 对username的值进行两边去空格过滤
               ['username', 'trim'],
               ['username', 'required', 'message' => '用户名不可以为空'],
               ['username', 'unique', 'targetClass' => '\api\models\User', 'message' => '用户名已存在.'],
               ['username', 'string', 'min' => 2, 'max' => 255],

              ['email', 'trim'],
              ['email', 'default', 'value' => null], 
              ['email', 'email'],
              ['email', 'string', 'max' => 255],
              ['email', 'unique', 'targetClass' => '\api\models\User', 'message' => '邮箱已经被使用了.','when'=> function($model, $attribute){
                        return  !!$attribute; // 邮箱不为空时候检查唯一性
              }],

               ['password', 'required', 'message' => '密码不可以为空'],
               ['password', 'string', 'min' => 6, 'tooShort' => '密码至少填写6位'],   

               
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
                    return null;
            }
           
            // 实现数据入库操作
            $user = new User;

            $user->username = $this->username;
            $user->email = $this->email;
      
            // 设置密码
            $user->setPassword($this->password);

             // 生成 "remember me" 认证key
            $user->generateAuthkey();

            // save(false)的意思是：不调用 User 的 rules 再做校验并实现数据入库操作
             // 这里这个 false 如果不加，save底层会调用  User 的rules方法再对数据进行一次校验，
             // 因为我们上面已经调用Signup的rules校验过了，这里就没必要在用 User 的 rules 校验了
            return   $user->save(false) ? $user : null;
          
       }

}
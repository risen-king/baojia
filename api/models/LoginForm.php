<?php
namespace api\models;

use Yii;
use yii\base\Model;

use api\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    
    //当前登陆 user 对象
    private $_user;
    
   

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

   /**
     * 自定义的密码认证方法
     */
    public function validatePassword($attribute, $params)
    {
         if (!$this->hasErrors()) {
                    
                    $user = $this->getUser();
                    
                    if (! $user  || ! $user->validatePassword($this->password)) {
                        
                             $this->addError($attribute, '用户名或密码错误.');
                             
                    }
         }
    }
    
    

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ( $this->validate() ) { 
            
            
            $this->onGenerateAccessToken();
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            
         }
         
         return false;
    }


    /**
     * 根据用户名获取用户的认证信息
     *
     * @return User|null
     */
    protected function getUser()
    {
         if ($this->_user === null) {
                    $this->_user = User::findByUsername($this->username);
         }

         return $this->_user;
    }
    
    /**
     * 登录校验成功后，为用户生成新的token
     * 如果token失效，则重新生成token
     */
    public   function onGenerateAccessToken()
    {
       
        if ( !User::checkAccessToken( $this->_user->access_token) ) {
                $this->_user->generateAccessToken();
                $this->_user->save(false);
        }
    }
}

<?php
namespace api\models;

use Yii;
use yii\base\Model;

use api\models\User;

use common\helper\Password;

/**
 * Login form
 */
class LoginForm extends Model
{

    /** @var string  用户邮箱,用户名,或手机号 */
    public $login;
    public $password;
    public $rememberMe = true;
    
    //当前登陆 user 对象
    private $user;


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login'      => Yii::t('user', 'Login'),
            'password'   => Yii::t('user', 'Password'),
            'rememberMe' => Yii::t('user', 'Remember me next time'),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'loginTrim' => ['login', 'trim'],
            'rememberMe' => ['rememberMe', 'boolean'],
            'requiredFields' => [['login', 'password'], 'required'],
            // password is validated by validatePassword()
            'passwordValidate' => ['password', 'validatePassword'],
        ];
    }


    
    

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ( $this->validate() ) {

            $this->user->last_login_at=time();
            $this->user->generateAccessToken();
            $this->user->save(false);

            return Yii::$app->user->login($this->user, $this->rememberMe ? 3600*24*30 : 0);
            
         }
         
        return false;
    }


    /**
     * 自定义的密码认证方法
     */
    public function validatePassword($attribute, $params)
    {


        if ($this->user === null || !Password::validate($this->password, $this->user->password_hash)){
            $this->addError($attribute, Yii::t('user', '用户名或密码错误.') );

        }


    }


    /** @inheritdoc */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {

            $this->user = User::findByMobile(trim($this->login));

            return true;
        } else {
            return false;
        }
    }
}

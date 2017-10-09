<?php
namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use backend\models\MemberGroup as Group;

use common\helper\Password;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends UserBase
{

    public static function tableName()
    {
        return '{{%user}}';
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'username'          => \Yii::t('user', 'Username'),
            'nickname'          => \Yii::t('user', '昵称'),
            'mobile'          => \Yii::t('user', '手机'),
            'email'             => \Yii::t('user', 'Email'),
            'money'             => \Yii::t('user', '余额'),
            'credit'             => \Yii::t('user', '积分'),
            'registration_ip'   => \Yii::t('user', 'Registration ip'),
            'unconfirmed_email' => \Yii::t('user', 'New email'),
            'password'          => \Yii::t('user', 'Password'),
            'created_at'        => \Yii::t('user', 'Registration time'),
            'last_login_at'     => \Yii::t('user', 'Last login'),
            'confirmed_at'      => \Yii::t('user', 'Confirmation time'),
            'confirmStatus'     => \Yii::t('user', '确认状态'),
            'blockStatus'     => \Yii::t('user', '锁定状态'),
        ];
    }



    /** @inheritdoc */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }



    public function getConfirmStatus(){
        if($this->getIsConfirmed()){
            return \Yii::t('user', 'Confirmed at {0, date, MMMM dd, YYYY HH:mm}', [$this->confirmed_at]);
        }else{
            return \Yii::t('user', 'Unconfirmed');
        }
    }


    public function getBlockStatus(){
        if($this->isBlocked){
            return \Yii::t('user', 'Blocked at {0, date, MMMM dd, YYYY HH:mm}', [$this->blocked_at]);
        }else{
            return \Yii::t('user', 'Not blocked');
        }
    }

    /**
     * @return bool Whether the user is confirmed or not.
     */
    public function getIsConfirmed()
    {
        return $this->confirmed_at != null;
    }

    /**
     * @return bool Whether the user is blocked or not.
     */
    public function getIsBlocked()
    {
        return $this->blocked_at != null;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    public function getGroupList(){
        $_arr =  Group::find()->select(['id','groupname'])->asArray()->indexBy('id')->all();

        $arr = [];
        foreach ($_arr as $key => $val){
            $arr[$key] = $val['groupname'];
        }

        return $arr;

    }


    /**
     * Finds user by mobile
     *
     * @param string $username
     * @return static|null
     */
    public static function findByMobile($username)
    {
        return static::find()->where(['mobile' => $username, 'status' => self::STATUS_ACTIVE])->orderBy('id desc')->one();
    }

    /**
     * Resets password.
     *
     * @param string $password
     *
     * @return bool
     */
    public function resetPassword($password)
    {
        return (bool)$this->updateAttributes(['password_hash' => Password::hash($password)]);
    }
}

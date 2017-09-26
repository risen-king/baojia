<?php

namespace backend\models;


use Yii;


use common\helper\Money;

/**
 * This is the model class for table "{{%finance_pay}}".
 *
 * @property string $pid
 * @property string $username
 * @property double $fee
 * @property string $currency
 * @property integer $paytime
 * @property string $ip
 * @property integer $moduleid
 * @property string $itemid
 * @property string $title
 */
class Pay extends \yii\db\ActiveRecord
{
    const PRIVILEGE_STATUS_ALL = 3;
    const PRIVILEGE_STATUS_FEE = 2;
    const PRIVILEGE_STATUS_LESS= 1;
    const PRIVILEGE_STATUS_OFF = 0;
    
    
    const FEE_MODE_CHARGE = 2;
    const FEE_MODE_INHERIT = 1;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%finance_pay}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee'], 'number'],
            [['created_at', 'itemid'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['currency'], 'string', 'max' => 20],
            [['ip'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => Yii::t('common/money', 'Itemid'),
            'username' => Yii::t('common/money', 'User Name'),
            'fee' => Yii::t('common/money', 'Fee'),
            'currency' => Yii::t('common/money', 'Currency'),
            'created_at' => Yii::t('common/money', 'Pay Time'),
            'ip' => Yii::t('common/money', 'Ip'),
            'mid' => Yii::t('common/money', 'Moduleid'),
            'msg_id' => Yii::t('common/money', 'Message ID'),
            'title' => Yii::t('common/money', 'Title'),
        ];
    }
    
      //检查信息是否已付过费
    public static function checkPay($mid, $itemid,$username,$period) {
	 
        $where=[
            'mid'=>$mid,
            'itemid'=>$itemid,
            'username'=>$username
        ];
        if('fee_period'){
            $where['paytime'] = ['>',$period];
        }
	
        return static::findOne($where) ? true : false;
       
    }
    
    public function getPrivStatus($item,$module){
        
        $_username = !Yii::$app->user->getIsGuest() ? Yii::$app->user->identity->username : '';
        
        
        $fee = Money::getFee($item->fee, $module->getConf('mod_fee'));
        
     
        $_m_group_show = $module->getConf('group_show');
       
        //会员组是否有权限查看本模块信息
        $_rank_enougth = UserRank::checkRank($_m_group_show) ; 
        $_rank_id =      UserRank::getRankId();
        $_r_fee_model =  UserRank::getFeeMode($_rank_id);
        
        if(  $_rank_enougth  ) {
                
                if($fee)
                {//信息需要缴费
                    
                    
                    //是否是收费会员（不需要另外缴费）
                    $_is_charge = $_r_fee_model ==  static::FEE_MODE_CHARGE 
                                && $_m_group_show === static::FEE_MODE_INHERIT;
                            
                    if($_is_charge)
                    { //收费会员
                            $user_status = static::PRIVILEGE_STATUS_ALL;
                     }
                     else
                     {//非收费会员
                        
                         if($_username){
                            
                            $_has_payed = static::checkPay($module->getUniqueId(), $item->id);// 本条信息是否已经交过费
                            $user_status = $_has_payed ? static::PRIVILEGE_STATUS_ALL : static::PRIVILEGE_STATUS_FEE;   
                        }else{
                            $user_status = static::PRIVILEGE_STATUS_OFF;
                        }
                    }
                     
                }
                else{//信息不需要缴费
                    $user_status = static::PRIVILEGE_STATUS_ALL;
                }
         
           
	}else{
            $user_status = $_username ? static::PRIVILEGE_STATUS_LESS : static::PRIVILEGE_STATUS_OFF;
        }
        
        if($_username && $_username == $item->username){//信息上传者本人
            $user_status = static::PRIVILEGE_STATUS_ALL;
        }
	 
	return $user_status;
      
    }
    
    
    public static function getPayUrl($item,$module){
       
        $_username = !Yii::$app->user->getIsGuest() ? Yii::$app->user->identity->username : '';
        $linkurl =  Yii::$app->request->getAbsoluteUrl();
        
        $fee =      Money::getFee($item->fee, $module->getConf('fee_view'));
        $fee_back = Money::getFeedBack($fee,$module->getConf('fee_back'),$module->getConf('fee_currency'));
        
       
        $_parms = array_filter([
            'mid'=>      $module->getUniqueId(),
            'itemid'=>   $item->id,
            'username'=> $_username,
            'fee'=>      $fee,
            'fee_back'=> $fee_back,
            'currency'=> $this->fee_currency,
            'title'=>    $item->title,
            'forward'=>  $linkurl,
        ]);
     
        $_sign =     Money::cryptSign(implode('', array_values($parms)));
        
        $_parms = array_merge([$module->getUniqueId().'/pay/'],$_parms,['sign'=>$_sign]);
     
        return $_parms;
       
    }
    
}

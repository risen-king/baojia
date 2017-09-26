<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "finance_charge".
 *
 * @property string $itemid
 * @property string $username
 * @property string $bank
 * @property string $amount
 * @property string $fee
 * @property string $money
 * @property integer $sendtime
 * @property integer $receivetime
 * @property string $editor
 * @property integer $status
 * @property string $note
 */
class Charge extends \yii\db\ActiveRecord
{
    public $repay;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finance_charge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'fee', 'money'], 'number'],
            [['sendtime', 'receivetime', 'status'], 'integer'],
            [['username', 'editor'], 'string', 'max' => 30],
            [['bank'], 'string', 'max' => 20],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => Yii::t('common/money', 'Itemid'),
            'username' => Yii::t('common/money', 'Username'),
            'bank' => Yii::t('common/money', 'Bank'),
            'amount' => Yii::t('common/money', 'Charge Amount'),
            'fee' => Yii::t('common/money', 'Charge Fee'),
            'money' => Yii::t('common/money', 'Real Amount'),
            'sendtime' => Yii::t('common/money', 'Sendtime'),
            'receivetime' => Yii::t('common/money', 'Receivetime'),
            'editor' => Yii::t('common/money', 'Editor'),
            'status' => Yii::t('common/money', 'Status'),
            'note' => Yii::t('common/money', 'Note'),
        ];
    }
    
    public function getRepay(){
        return $this->status == 0 && time() - $this->sendtime > 600 ? 1 : 0;
        
    }
    
    
    public function getPayment(){
        return 'bank';
    }
    
    public function getAvaiPayment(){
        $_payment = Yii::$app->params['payment'];
        foreach($_payment as $k=>$v){
            $payment[$v['name']] = '<img src="'.$v['thumb'].'">&nbsp;&nbsp;手续费&nbsp;&nbsp;'.$v['fee'].'%';
        }
        
        return $payment;
    }
}

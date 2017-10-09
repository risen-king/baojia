<?php
namespace backend\models;


use Yii;
use common\component\TimestampBehavior;

/**
 * This is the model class for table "finance_credit".
 *
 * @property string $itemid
 * @property string $username
 * @property integer $amount
 * @property integer $balance
 * @property integer $addtime
 * @property string $reason
 * @property string $note
 * @property string $editor
 */
class Credit extends \yii\db\ActiveRecord
{   //增加或减少积分
    public $direction = 1;
    //购买积分额度
    public $type;
    //支付密码
    public $password;


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),

        ];
    }
   
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finance_credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'balance'], 'integer'],
            [['username', 'editor'], 'string', 'max' => 30],
            [['reason', 'note'], 'string', 'max' => 255],
            [['type','direction','password'],'safe']
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
            'amount' => Yii::t('common/money', 'Amount'),
            'balance' => Yii::t('common/money', 'Balance'),
            'created_time' => Yii::t('common/money', 'Addtime'),
            'reason' => Yii::t('common/money', 'Reason'),
            'note' => Yii::t('common/money', 'Note'),
            'reason'=>Yii::t('common/money', 'Reason'),
            'editor' => Yii::t('common/money', 'Editor'),
            'direction' => Yii::t('common/money', 'Flow Direction'),
            'type'=>Yii::t('common/money', 'Buy Amount'),
            'in_amount'=>Yii::t('common/money', 'Income'),
            'out_amount'=>Yii::t('common/money', 'Outcome'),
            
        ];
    }
    
  
    
 
}

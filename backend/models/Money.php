<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "finance_record".
 *
 * @property string $itemid
 * @property string $username
 * @property string $bank
 * @property string $amount
 * @property string $balance
 * @property integer $addtime
 * @property string $reason
 * @property string $note
 * @property string $editor
 */



class Money extends \yii\db\ActiveRecord
{
    //资金增加还是减少
    public $direction = 1;
    
    //默认付款方式
    public $pay_name='bank';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'finance_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'balance'], 'number'],
            [['addtime'], 'integer'],
            [['username', 'bank', 'editor'], 'string', 'max' => 30],
            [['reason', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => Yii::t('money', 'Itemid'),
            'username' => Yii::t('money', 'Username'),
            'bank' => Yii::t('money', 'Bank'),
            'amount' => Yii::t('money', 'Amount'),
            'balance' => Yii::t('money', 'Balance'),
            'addtime' => Yii::t('money', 'Addtime'),
            'reason' => Yii::t('money', 'Reason'),
            'note' => Yii::t('money', 'Note'),
            'editor' => Yii::t('money', 'Editor'),
            'direction' => Yii::t('money', 'Flow Direction'),
        ];
    }
}

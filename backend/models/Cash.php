<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%finance_cash}}".
 *
 * @property string $itemid
 * @property string $username
 * @property string $bank
 * @property string $account
 * @property string $truename
 * @property string $amount
 * @property string $fee
 * @property integer $addtime
 * @property string $ip
 * @property string $editor
 * @property integer $edittime
 * @property string $note
 * @property integer $status
 */
class Cash extends \yii\db\ActiveRecord
{
    
    public $passsword;
    
    //是否来自提现表单的请求
    public $from_apply;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%finance_cash}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'fee'], 'number'],
            [['addtime', 'edittime', 'status'], 'integer'],
            [['username', 'account', 'truename', 'editor'], 'string', 'max' => 30],
            [['bank', 'ip'], 'string', 'max' => 50],
            [['note'], 'string', 'max' => 255],
            [['password','from_apply'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => Yii::t('common/cash', 'Itemid'),
            'username' => Yii::t('common/cash', 'Username'),
            'bank' => Yii::t('common/cash', 'Bank'),
            'account' => Yii::t('common/cash', 'Account'),
            'truename' => Yii::t('common/cash', 'Truename'),
            'amount' => Yii::t('common/cash', 'Amount'),
            'fee' => Yii::t('common/cash', 'Fee'),
            'addtime' => Yii::t('common/cash', 'Addtime'),
            'ip' => Yii::t('common/cash', 'Ip'),
            'editor' => Yii::t('common/cash', 'Editor'),
            'edittime' => Yii::t('common/cash', 'Edittime'),
            'note' => Yii::t('common/cash', 'Note'),
            'status' => Yii::t('common/cash', 'Status'),
        ];
    }
}

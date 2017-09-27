<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock_price".
 *
 * @property integer $id
 * @property string $date
 * @property integer $symbol
 * @property string $name
 * @property string $close
 * @property string $high
 * @property string $low
 * @property string $open
 * @property string $adj_close
 * @property string $change
 * @property string $changed_rate
 * @property string $exchange
 * @property string $vol
 * @property string $aomount
 * @property string $gmw
 * @property string $emv
 */
class ProductPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['symbol'], 'required'],
            [['symbol', 'vol', 'amount', 'gmw', 'emv'], 'integer'],
            [['close', 'high', 'low', 'open', 'adj_close', 'change', 'changed_rate', 'exchange'], 'number'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => \Yii::t('common','Date'),
            'symbol' => \Yii::t('common','Product Symbol'),
            'name' => \Yii::t('common','Product Name'),
            'close' =>\Yii::t('common','Close Price'),
            'high' => \Yii::t('common','High Price'),
            'low' => \Yii::t('common','Low Price'),
            'open' =>\Yii::t('common','Open Price'),
            'adj_close' => '昨收',
            'changed_rate' => '涨跌幅',
            'change' => '涨跌额',
            'vol' => '成交量',
            'amount' => '成交额',

        ];
    }




    public function getProduct(){
        return $this->hasOne(Product::className(), ['symbol'=>'symbol']);
    }

    public function  getName(){
        return $this->product ? $this->product->name : '';
    }
}

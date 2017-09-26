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
class StockPrice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['symbol'], 'required'],
            [['symbol', 'vol', 'aomount', 'gmw', 'emv'], 'integer'],
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
            'date' => '日期',
            'symbol' => 'Symbol',
            'name' => 'Name',
            'close' => '收盘价',
            'high' => '最高价',
            'low' => '最低价',
            'open' => '开盘价',
            'adj_close' => 'Adj Close',
            'change' => 'Change',
            'changed_rate' => 'Changed Rate',
            'exchange' => 'Exchange',
            'vol' => 'Vol',
            'aomount' => 'Aomount',
            'gmw' => 'Gmw',
            'emv' => 'Emv',
        ];
    }
}

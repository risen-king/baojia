<?php

namespace backend\models;

use Yii;

use backend\models\Stock as Product;

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
            'date' => \Yii::t('common','Date'),
            'symbol' => \Yii::t('common','Product Symbol'),
            'name' => \Yii::t('common','Product Name'),
            'close' =>\Yii::t('common','Close Price'),
            'high' => \Yii::t('common','High Price'),
            'low' => \Yii::t('common','Low Price'),
            'open' =>\Yii::t('common','Open Price'),
            
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
    
    
    public function getProduct(){
        return $this->hasOne(Product::className(), ['symbol'=>'symbol']);
    }
 
    
    /*
     * 如果插入数据或更新数据，则更新Product价格
     */
    public   function afterSave($insert, $changedAttributes) {
      
        parent::afterSave($insert, $changedAttributes);
        
        if( $insert ){
            
              $this->product->price = $this->close;
              
              $this->product->save();
              
        }elseif ( array_key_exists('close', $changedAttributes) ) {
            
            $latest = static::find()
                    ->where(['symbol'=>$this->symbol ])
                    ->orderBy('date DESC')
                    ->limit(1)
                    ->one();
           
            $this->product->price = $latest->close;
            
            $this->product->save();
            
        }
        
         
 

    }
}

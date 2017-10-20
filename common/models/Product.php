<?php

namespace common\models;
 

use Yii;
use common\component\UploadBehavior;
use common\component\TimestampBehavior;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $code
 * @property string $name
 * @property string $ipo_date
 */
class Product extends \yii\db\ActiveRecord
{
     public $catname;


    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::className()],
            ['class' => UploadBehavior::className() ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ipo_date','catid','price','adj_close','onsale','content'], 'safe'],
            [['symbol',], 'string', 'max' => 6],
            [['code'], 'string', 'max' => 8],
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
            'catid' => \Yii::t('common',' Category Name'),
            'symbol' => \Yii::t('common','Product Symbol'),
            'name' => \Yii::t('common','Product Name'),
            'onsale'=>  \Yii::t('common',   'On Sale'),
            'catname' => \Yii::t('common','Category Name'),
            'thumb'=>  \Yii::t('common','Thumb'),
            'content'=>\Yii::t('common','Content'),
            'price_date' => \Yii::t('common','采价日期'),
            'price'=>\Yii::t('common','Price'),
            'adj_close'=>\Yii::t('common','昨收'),
            'rate'=>\Yii::t('common','增长率'),
        ];
    }

    //价格变化率
    public function getRate(){

        $change = $this->getChange();

        if($change && $this->adj_close != 0){

            $rate = $change / $this->adj_close;

            $sign = $rate >= 0 ? '+' : '-';
            $result = sprintf('%s%.2f%%', $sign, 100*abs($rate) );

            return $result;

        }else{
            return null;
        }
    }

    //产品价格变化
    public function getChange(){

        if($this->price >= 0 && $this->adj_close >= 0 ){
            return $this->price - $this->adj_close;
        }else{
            return null;
        }
    }




    public function getCategory(){
        return   $this->hasOne(Category::className(), ['id'=>'catid']) ;
    }



}

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
            [['ipo_date','catid','prev_price','price','onsale','content'], 'safe'],
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


    public function getCategory(){
        return   $this->hasOne(Category::className(), ['id'=>'catid']) ;
    }

    public function getRate(){
        $_price0 = abs($this->adj_close);
        $_price1 = abs($this->price);

        $result = 0;

        if( $_price0 ){
            $diff = $_price1 - $_price0;
            $rate =  100 * $diff / $_price0;
            $sign = $diff >= 0 ? '+' : '-';

            $result = sprintf('%s%.2f%%', $sign,abs($rate));

        }else{
            $result = '-';

        }

        return $result;


    }


    public function getRatestr(){

        $_price0 = abs($this->prev_price);

        if( $_price0 ){

            $_price1 = abs($this->price);

            $result =  boolval( $_price1 - $_price0 ) ? 'up' : 'down';

        }else{
            $result = 'none';
        }

        return $result;


    }













}

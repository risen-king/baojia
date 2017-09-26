<?php

namespace common\models;
 

use Yii;
 
 

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $code
 * @property string $name
 * @property string $ipo_date
 */
class Stock extends \yii\db\ActiveRecord
{
     public $catname;
     
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ipo_date','catid','content','price','onsale'], 'safe'],
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
            'catid' => '分类',
            'symbol' => '代码',
            'name' => '名称',
            'onsale'=>'上架',
            'ipo_date' => '日期',
            'catname' => '分类',
            'thumb'=>'缩略图',
            'content'=>'介绍',
            'price'=>'价格'
        ];
    }
    
    
    
    
   
}

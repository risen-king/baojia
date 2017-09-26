<?php

namespace backend\models;

use Yii;

use common\component\UploadBehavior;
use common\component\TimestampBehavior;

use backend\models\Category;
 

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
            'catid' => \Yii::t('common',' Category Name'), 
            'symbol' => \Yii::t('common','Product Symbol'), 
            'name' => \Yii::t('common','Product Name'), 
            'onsale'=>  \Yii::t('common',   'On Sale'), 
            'ipo_date' => \Yii::t('common','IPO Date'),
            'catname' => \Yii::t('common','Category Name'),
            'thumb'=>  \Yii::t('common','Thumb'),
            'content'=>\Yii::t('common','Content'),
            'price'=>\Yii::t('common','Price'),
        ];
    }
    
    
    
    
    public function getCategory(){
          return   $this->hasOne(Category::className(), ['id'=>'catid']) ;
    }
    
   public function getTree(){
       
       return Category::getSelectTree();
            
    }
    
    
     
}

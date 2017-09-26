<?php

namespace backend\models;

use Yii;

use common\component\UploadBehavior;
use common\component\TimestampBehavior;
 
use backend\models\Artcat as Category;
 

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends \yii\db\ActiveRecord
{
   
    public function behaviors()
    {
        return [
             TimestampBehavior::className(),
             UploadBehavior::className()
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'catid' => '分类',
            'title' => '标题',
             'thumb'=>'缩略图',
             'content'=>'介绍',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function getCategory(){
          return   $this->hasOne(Category::className(), ['id'=>'catid']) ;
    }
    
    
    public function getTree(){
       
       return Category::getSelectTree();
            
    }
    
   
    
   
}

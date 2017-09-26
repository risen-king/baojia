<?php

namespace common\models;

use Yii;
use yii\data\ArrayDataProvider;

use common\helper\Tree;
use common\component\UploadBehavior;
use common\component\TimestampBehavior;


/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $catname
 */
class Category extends \yii\db\ActiveRecord
{

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
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            ['pid', 'default', 'value' => 0],
            [['catname'], 'required'],
            [['catname'], 'string', 'max' => 50],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => \Yii::t('common', 'Parent Category'),  
            'catname' => \Yii::t('common', 'Category Name'),  
            'sort'=> \Yii::t('common', 'Sort'),  
        ];
    }

   
    
    public static  function getTree(){
         
         $cats = static::find()->asArray()->all();
        
         $tree =  $cats ?  Tree::getTree($cats ) :  [];
 
         return $tree;
    
    }
    
    
    public static  function getTableTree(){
        
        $_tree = static::getTree();
        
        $dataProvider = new ArrayDataProvider([
                'allModels' => $_tree ,
                'pagination' => false,

            ]);
        
        return $dataProvider;
    }
    
    
    public function getSelectTree(){
         
         $_tree = static::getTree();
        
         $tree = [];
         foreach($_tree as $id => $item){
            
            $tree[$id]  = $item['html'] . $item['catname'];
            
           }
        
          return $tree;
    }
    
  
    
   /*
    * 当前分类的父分类
    */
   public function getPcat(){
          
         return     $this->hasOne(static::className(), ['id' => 'pid']);
   }
}

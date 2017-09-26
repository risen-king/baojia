<?php
namespace api\modules\v1\controllers;

 use yii\rest\ActiveController;
 
 use yii\data\ActiveDataProvider;

class  StockPriceController  extends ActiveController
{
          public $modelClass = 'api\models\StockPrice';
          
         public function actions() {
         
                  $actions = parent::actions();

                    // 注销系统自带的实现方法
                   unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);

                   return $actions;
          }
  
           
          public function behaviors()
          {
                    $behaviors = parent::behaviors();
                    
                    //取消验证
                    $behaviors['authenticator']['optional'][] = 'index';
              
                    return $behaviors;
          }
         
         public function actionIndex($symbol){
              
                    $query = $this->modelClass::find()
                            ->select(['date','open','close','low','high'])
                            ->where(['symbol'=>$symbol])->limit(150);
                
                     return new ActiveDataProvider([
                               'query'=>$query
                     ]);
                   
               

          }
}

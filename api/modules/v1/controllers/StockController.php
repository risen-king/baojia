<?php
namespace api\modules\v1\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;

 
use yii\rest\ActiveController;

class  StockController  extends ActiveController
{
    public $modelClass = 'api\models\Stock';
    
//    public $serializer = [
//          'class' => 'yii\rest\Serializer',
//          'collectionEnvelope' => 'items',
//    ];
    
   
    
    
    public function behaviors()
    {
          return ArrayHelper::merge([
                [
                        'class' => Cors::className(),
                        'cors' => [
                            'Origin' => ['http://test.local'],
                            'Access-Control-Request-Method' => ['GET','POST','PUT'],
                            'Access-Control-Request-Headers'=>['*']
                        ],

                ],
        ], parent::behaviors());
    }
}

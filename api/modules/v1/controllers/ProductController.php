<?php
namespace api\modules\v1\controllers;

use yii\filters\Cors;
use yii\data\ActiveDataProvider;


use yii\rest\ActiveController;

class  ProductController  extends ActiveController
{
    public $modelClass = 'api\models\Product';
    
    public $serializer = [
          'class' => 'yii\rest\Serializer',
          'collectionEnvelope' => 'items',
    ];
    
     
    
    public function behaviors()
    {     
          $behaviors = parent::behaviors();
          
          $behaviors['corsFilter'] = [
              'class' => Cors::className(),
              'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET','POST','PUT'],
                    'Access-Control-Request-Headers'=>['*']
                ],
          ];
          
          return  $behaviors;
    }


    public function actionPrices(){

        $modelClass = 'api\models\ProductPrice';

        $symbol = \Yii::$app->request->get('word','');

        $query = $modelClass::find()
            ->select(['date','open','close','low','high'])
            ->where(['symbol'=>$symbol])
            ;

        return new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>150
            ]
        ]);


    }
    
    public function actionSearch(){

        $word = \Yii::$app->request->get('word','');

        $modelClass = $this->modelClass;

        if( $word ){


            $query = $modelClass::find()
                    ->where( ['like', 'symbol',$word] )
                    ->limit(10);

            $provider = new ActiveDataProvider([
                        'query'=>$query
                ]);

            return  $provider;

        }
    }
}

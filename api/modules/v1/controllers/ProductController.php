<?php
namespace api\modules\v1\controllers;

use yii\filters\Cors;
use yii\data\ActiveDataProvider;


use api\modules\v1\controllers\BaseController  as ActiveController;

class  ProductController  extends ActiveController
{
    public $modelClass = 'api\models\Product';
    


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

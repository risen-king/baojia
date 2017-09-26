<?php

namespace api\modules\v1\controllers;

use api\models\Article;

use yii\filters\Cors;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = 'api\models\Article';

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


    /**
     * @param $word
     * @return ActiveDataProvider
     */
    public function actionSearch($word){


        $word = \Yii::$app->request->get('word','');

        if($word){
            $query = $this->modelClass::find()
                ->where(['like', 'title', $word])
                ->limit(10);

            $provider = new ActiveDataProvider([
                'query'=>$query
            ]);

            return  $provider;

        }



    }
}
          
  
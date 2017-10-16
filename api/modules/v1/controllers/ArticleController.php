<?php

namespace api\modules\v1\controllers;

use api\models\Article;

use yii\filters\Cors;
use yii\data\ActiveDataProvider;

use api\modules\v1\controllers\BaseController  as ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = 'api\models\Article';


    /**
     * @param $word
     * @return ActiveDataProvider
     */
    public function actionSearch(){


        $word = \Yii::$app->request->get('keyword','');
        //echo $word;die;

        $modelClass = $this->modelClass;

        if($word){
            $query = $modelClass::find()
                    ->where(['like', 'title', $word]);

            //echo $query->createCommand()->getRawSql();die;

            $provider = new ActiveDataProvider([
                'query'=>$query
            ]);

            return  $provider;

        }



    }
}
          
  
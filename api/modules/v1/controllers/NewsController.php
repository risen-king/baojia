<?php

namespace api\modules\v1\controllers;

use api\models\News;

class NewsController extends \yii\rest\ActiveController
{
          public $modelClass = 'api\models\News';
          
          
          public function actionSearch($keyword){
                    
                    if(!$keyword){
                        return null;
                    }
              
                    $models = News::find()->where(['like', 'title', $keyword])->all();
                    
                    return $models;
              
          }
}
          
  
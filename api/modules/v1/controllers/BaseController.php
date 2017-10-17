<?php

namespace api\modules\v1\controllers;


use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

use common\helper\Util;


class BaseController extends \yii\rest\ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

     public function behaviors()
     {
         $behaviors = parent::behaviors();

         // remove authentication filter
         $auth = $behaviors['authenticator'];
         unset($behaviors['authenticator']);

         $behaviors['corsFilter'] = [
             'class' => Cors::className(),
             'cors' => [
                 'Origin' => ['http://localhost:8100','http://api.baojia.local','http://api.maybe88.com'],
                 'Access-Control-Request-Method' => ['GET','POST','PUT'],
                 'Access-Control-Request-Headers'=>['*']
             ],
         ];


         return  $behaviors;
     }


}

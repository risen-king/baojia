<?php

namespace api\modules\v1\controllers;

class NewsController extends \yii\rest\ActiveController
{
          public $modelClass = 'api\models\News';
          
          public $serializer = [
                    'class' => 'yii\rest\Serializer',
                    'collectionEnvelope' => 'items',
                ];
            }

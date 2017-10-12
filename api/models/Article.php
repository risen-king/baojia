<?php

namespace api\models;

use Yii;

use common\models\Article as ArticleBase;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $thumb
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends ArticleBase
{

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['content']);



//        $fields['created_at'] = function($model) {
//                return date('y-m-d', time($model->created_at));
//            };
//
//        $fields['updated_at'] = function($model) {
//            return date('y-m-d', time($model->updated_at));
//        };

        return $fields;
    }





}

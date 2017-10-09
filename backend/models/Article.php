<?php

namespace backend\models;

use Yii;


use common\models\Article as ArticleBase;

 

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends ArticleBase
{



    public  function beforeSave($insert)
    {

        if (!parent::beforeSave($insert)) {
             return false;
        }

        if( !$this->digest && $this->content ){

            $content = strip_tags($this->content);
            //去掉多余空行
            preg_replace("/(\r\n|\n|\r|\t)/i", '', $content);

            $this->digest = mb_substr($content,0,255);



        }

        return true;

    }
}

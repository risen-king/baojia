<?php

namespace backend\models;

use common\models\Category as BaseCategory;


/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $catname
 */
class Category extends BaseCategory
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    
}

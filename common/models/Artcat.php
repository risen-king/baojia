<?php

namespace common\models;
 

use common\models\Category as BaseCategory;


/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $catname
 */
class Artcat extends BaseCategory
{
 
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artcat';
    }


}

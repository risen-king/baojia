<?php

namespace backend\models;

 

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class AdminUser extends \mdm\admin\models\User
{
     /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }
    
   
}

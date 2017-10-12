<?php

namespace api\models;

use Yii;



class Credit extends  \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'finance_credit';
    }


}
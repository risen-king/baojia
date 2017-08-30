<?php

namespace api\models;

use yii\db\ActiveRecord;

class StockPrice extends ActiveRecord
{
     public function rules()
    {
        return [
            [['date','symbol','name','close','high','low','open','adj_close','change','changed_rate','exchange','vol','aomount','gmw','emv'], 'safe'],
        ];
    }
}
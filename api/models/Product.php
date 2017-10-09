<?php

namespace api\models;

use yii\db\ActiveRecord;

use common\models\Product as ProductBase;

class Product extends ProductBase
{


    public function rules()
    {
        return [
            [['symbol', 'code','name','ipo_date','rate','ratestr'], 'safe'],
        ];
    }

    // 明确列出每个字段，适用于你希望数据表或
    // 模型属性修改时不导致你的字段修改（保持后端API兼容性）
    public function fields()
    {

        parent::fields();
        return [
             'id',
             'symbol',
             'name',
             'adj_close',
             'price',
             'rate',
             'ratestr'

         ];
    }



}
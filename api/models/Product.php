<?php

namespace api\models;

use yii\db\ActiveRecord;

class Product extends \common\models\Product
{

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
             'change',
             'rate',
             'updown',
         ];
    }



    //价格上升还是下跌
    public function getUpdown(){

        $change = $this->getChange();

        if($change > 0  ){
            return 'up';
        }elseif($change < 0){
            return 'down';
        }else{
            return 'none';
        }
    }



}
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

    //产品价格变化
    public function getChange(){

        if($this->price >= 0 && $this->adj_close >= 0 ){
            return $this->price - $this->adj_close;
        }else{
            return null;
        }
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

    //价格变化率
    public function getRate(){

        $change = $this->getChange();

        if($change && $this->adj_close != 0){

            $rate = $change / $this->adj_close;

            $sign = $rate >= 0 ? '+' : '-';
            $result = sprintf('%s%.2f%%', $sign, 100*abs($rate) );

            return $result;

        }else{
            return null;
        }
    }

}
<?php

namespace backend\models;

use Yii;
use common\models\ProductPrice as ProductPriceBase;

use backend\models\Product as Product;

/**
 * This is the model class for table "stock_price".
 *
 * @property integer $id
 * @property string $date
 * @property integer $symbol
 * @property string $name
 * @property string $close
 * @property string $high
 * @property string $low
 * @property string $open
 * @property string $adj_close
 * @property string $change
 * @property string $changed_rate
 * @property string $exchange
 * @property string $vol
 * @property string $aomount
 * @property string $gmw
 * @property string $emv
 */
class ProductPrice extends ProductPriceBase
{

    public function getAdjModel($time=null){


        if($time === null){
            $time = time();
        }elseif(is_numeric($time)){
            $time = intval($time);
        }else{
            $time = strtotime($time);
        }

        $time = $time - 3600*24;
        $date = date('Y-m-d',$time);

        $adjModel = static::find()
            ->where([
                'symbol'=>$this->symbol,
                'date'=> $date,
            ])
            ->orderBy('date DESC')
            ->limit(1)
            ->one();

        return $adjModel;


    }

    /*
     * 如果插入数据或更新数据，则更新Product价格
     */
    public  function afterSave($insert, $changedAttributes) {
      
        parent::afterSave($insert, $changedAttributes);

        //更新 adj_close
        if($this->close && $this->date && !$this->adj_close){
            //查找前一日记录
            $adjModel =  $this->getAdjModel($this->date);

            if($adjModel->close){
                $this->adj_close = $adjModel->close;
                $this->change = $this->close - $this->adj_close;
                $this->changed_rate = $this->change / $this->adj_close;

                $this->save(false);
            }


        }


        //查找当日价格
        $priceModel = static::find()
                    ->where([
                            'symbol'=>$this->symbol,
                            'date'=> date('Y-m-d'),
                        ])
                    ->orderBy('date DESC')
                    ->limit(1)
                    ->one();

        if($priceModel){
            $this->product->price = $priceModel->close;
            $this->product->adj_close = $priceModel->adj_close;
            $this->product->change = $priceModel->change;
            $this->product->changed_rate = $priceModel->changed_rate;

            $this->product->save(false);
        }




        
//        if( $insert ){
//
//              $this->product->save();
//
//        }elseif ( array_key_exists('close', $changedAttributes) ) {
//
//            $latest = static::find()
//                    ->where(['symbol'=>$this->symbol ])
//                    ->orderBy('date DESC')
//                    ->limit(1)
//                    ->one();
//
//            $this->product->price = $latest->close;
//
//
//
//        }
        
         
 

    }
}

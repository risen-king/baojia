<?php

use yii\helpers\Html;
use yii\helpers\Url;
 
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
 
?>
<div class="goods-view">
 
    <h1></h1>

        <?= TabsX::widget([
        'items' => [
           
            [
                'label' => '充值记录',
                'headerOptions' => ["id" => 'record-tab'],
                'url'=>Url::to(['index']),
                'active' => $this->context->action->id=='index' ? true : false,
               
            ],
            
            [
                'label' => '统计报表',
                'headerOptions' => ["id" => 'setting-tab'],
                'url'=>'#',
                'active' => $this->context->action->id=='setting' ? true : false,
               
            ],
    
     
        ],
    ]);
     
    ?>
    
    <?= $content ?>

</div>

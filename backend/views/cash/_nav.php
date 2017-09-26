<?php

use yii\helpers\Html;
use yii\helpers\Url;
 
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

//$this->title = $model->goods_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">
 
    <h1></h1>

        <?= TabsX::widget([
        'items' => [
        
            [
                'label' => '提现记录',
                'headerOptions' => ["id" => 'index-tab'],
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

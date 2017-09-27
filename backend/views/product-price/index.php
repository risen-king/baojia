<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('common','History Prices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-price-index">

    <?= $this->render('../product/_menu') ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'date',
            'symbol',
            'name',
            'close',
            'adj_close',
            'change',
            [

                'attribute'=>'changed_rate',
                'value' => function($model){
                    return sprintf('%.2f%%',$model->changed_rate*100);
                }
            ],
            'open',
            'high',
            'low',
            'vol',
            'amount',


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'buttons'=>[
                    'update' =>  function ($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['product-price/update','id'=>$model->id]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]);
                        return Html::a($icon, $url);
                    },
                    'delete' =>  function ($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['product-price/delete','id'=>$model->id]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
                        return Html::a($icon, $url);
                    },

                ]
            ],
        ],
    ]); ?>
</div>

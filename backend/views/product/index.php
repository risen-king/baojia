<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('common','Products'); 
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

   <?= $this->render('_menu') ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'symbol',
            [
                 
                'attribute'=>'catname',
                'value' => 'category.catname'
            ],
            
            'name',
            'adj_close',
            'price',
            'rate',


            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>\Yii::t('common','Operations'),
                'template' => '{list} {update} {delete}',
                'buttons'=>[
                    'list' =>  function ($url, $model, $key) {
                                        $url = \yii\helpers\Url::to(['product-price/index','symbol'=>$model->symbol]);
                                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-list"]);
                                        return Html::a($icon, $url);
                              },
                   
                ]
                
                
            ],
        ],
    ]); ?>
</div>

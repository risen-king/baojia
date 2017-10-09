<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

     <?= $this->render('_menu') ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "rowOptions" => function($model, $key, $index, $grid) {
                return ["class" => $index % 2 ==0 ? "label-red" : "label-green"];
        },
        'columns' => [
            [
                'attribute'=>'id',
                 'headerOptions' => ['width' => '100'],
            ],
            
            [
                'attribute'=>'catname',
                'label'=>'分类',
                'value'=>'category.catname'
                
            ],
         
            'title',

            [
                'label'=>'创建日期',
                'attribute'=>'created_at',
                'format'=>['date','php:Y-m-d']
            ],
            'sort',

          [
              'class' => 'yii\grid\ActionColumn',
              'header' => '操作',
          ],
        ],
    ]); ?>
    
</div>


 
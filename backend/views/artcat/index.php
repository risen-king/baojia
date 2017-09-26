<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =  \Yii::t('common','Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

   <?= $this->render('../article/_menu') ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            
            [
                'attribute'=>'id',
                'label'=>\Yii::t('common','ID'),
                'headerOptions' => ['width' => '100'],
            ],
            
            
             [
                'attribute'=>'catname',
                 'label'=>\Yii::t('common','Category Name'),
                 'value'=>function($model){
                        return $model['html'] . $model['catname'];
                 },
               
            ],
                         
          [
                'attribute'=>'sort',
               'label'=>\Yii::t('common','Sort'),
                 'headerOptions' => ['width' => '100'],
               
            ],
            
            [
                    'class' => 'yii\grid\ActionColumn',
                    "header" =>\Yii::t('common','Operations'),
                    'template' => '{addChild}  {update}  {delete}',
                    'buttons'=>[
                          'addChild' => function($url,$model,$key){
                                     $id = $model['id'];
                                     $url = \yii\helpers\Url::to( [ 'artcat/create', 'pid'=>$id ] );
                                     return  Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                          'title' =>\Yii::t('common','Children Categories'),
                                          
                                      ]);
                           }
                    ],
          ],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'symbol',
            'code',
            'name',
            'ipo_date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{list} {update} {delete}',
                'buttons'=>[
                    'list' =>  function ($url, $model, $key) {
                                        $url = \yii\helpers\Url::to(['stock-price/index','symbol'=>$model->symbol]);
                                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-list"]);
                                        return Html::a($icon, $url);
                              },
                   
                ]
                
                
            ],
        ],
    ]); ?>
</div>

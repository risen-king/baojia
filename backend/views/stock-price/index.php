<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockPriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-price-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stock Price', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'date',
            'symbol',
            'name',
            'close',
             'high',
             'low',
            'open',
            // 'adj_close',
            // 'change',
            // 'changed_rate',
            // 'exchange',
            // 'vol',
            // 'aomount',
            // 'gmw',
            // 'emv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

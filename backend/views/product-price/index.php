<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockPriceSearch */
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
            ],
        ],
    ]); ?>
</div>

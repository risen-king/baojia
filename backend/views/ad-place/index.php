<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdPlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Ad Places');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-place-index">

    <?= $this->render('../ad/_menu') ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'status',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

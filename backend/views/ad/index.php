<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Ads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-index">


    <?= $this->render('_menu') ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            [

                'attribute'=>'placename',
                'value' => 'place.name'
            ],

            'name',
            'status',
            'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

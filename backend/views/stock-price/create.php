<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\StockPrice */

$this->title = 'Create Stock Price';
$this->params['breadcrumbs'][] = ['label' => 'Stock Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockPrice */

$this->title = \Yii::t('common','Update Product Price:') . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = \Yii::t('common','Update');
?>
<div class="stock-price-update">

    <?= $this->render('../product/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

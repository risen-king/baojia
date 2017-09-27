<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ProductPrice */

$this->title = 'Create Product Price';
$this->params['breadcrumbs'][] = ['label' => 'Product Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-price-create">

    <?= $this->render('../product/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

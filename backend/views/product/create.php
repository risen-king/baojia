<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Stock */

$this->title = 'Create Stock';
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-create">

    <?= $this->render('_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

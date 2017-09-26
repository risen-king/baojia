<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockPriceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-price-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'symbol') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'close') ?>

    <?php // echo $form->field($model, 'high') ?>

    <?php // echo $form->field($model, 'low') ?>

    <?php // echo $form->field($model, 'open') ?>

    <?php // echo $form->field($model, 'adj_close') ?>

    <?php // echo $form->field($model, 'change') ?>

    <?php // echo $form->field($model, 'changed_rate') ?>

    <?php // echo $form->field($model, 'exchange') ?>

    <?php // echo $form->field($model, 'vol') ?>

    <?php // echo $form->field($model, 'aomount') ?>

    <?php // echo $form->field($model, 'gmw') ?>

    <?php // echo $form->field($model, 'emv') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

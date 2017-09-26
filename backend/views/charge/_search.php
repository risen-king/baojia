<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FinanceChargeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="finance-charge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'bank') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'fee') ?>

    <?php // echo $form->field($model, 'money') ?>

    <?php // echo $form->field($model, 'sendtime') ?>

    <?php // echo $form->field($model, 'receivetime') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

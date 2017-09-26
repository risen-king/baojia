<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CreditSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'balance') ?>

    <?= $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

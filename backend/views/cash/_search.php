<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CashSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cash-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'bank') ?>

    <?= $form->field($model, 'account') ?>

    <?= $form->field($model, 'truename') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'fee') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'editor') ?>

    <?php // echo $form->field($model, 'edittime') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common/cash', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common/cash', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

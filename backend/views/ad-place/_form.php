<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\models\AdPlace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-place-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'type' => SwitchInput::CHECKBOX,
        'pluginOptions' => [
            'onText' => '开启',
            'offText' => '关闭',
            'onColor' => 'success',
            'offColor' => 'danger',
        ]
    ]); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

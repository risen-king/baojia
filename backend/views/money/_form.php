<?php

use yii\helpers\Html;

use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;
use app\models\Payment;

/* @var $this yii\web\View */
/* @var $model app\models\Record */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textarea(['maxlength' => true]) ?>
   
    
    <?= $form->field($model, 'direction')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
                'pluginOptions' => [
                    'onText' => '收入',
                    'offText' => '支出',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ]
        ]); ?>
    
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'bank')->dropDownList([]) ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

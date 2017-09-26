<?php

use yii\helpers\Html;
 
use kartik\form\ActiveForm;
use kartik\switchinput\SwitchInput;

 

/* @var $this yii\web\View */
/* @var $model app\models\Credit */

$this->title = Yii::t('money', 'Credit Change');
$this->params['breadcrumbs'][] = ['label' => Yii::t('money', 'Credits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credit-create">
 
    <div class="record-form">
          <?= $this->render('_menu') ?>

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
        

        <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>
        

        <div class="form-group">
            
                    <?= Html::submitButton(
                            $model->isNewRecord ? Yii::t('common', 'Yes') : Yii::t('common', 'Update'), 
                            ['class' => $model->isNewRecord ? 'btn btn-block btn-success' : 'btn btn-block btn-primary']) ?>
            
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>

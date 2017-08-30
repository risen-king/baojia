<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker; 
 

/* @var $this yii\web\View */
/* @var $model backend\models\StockPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(),[
            'options' => ['placeholder' => ''], 
            'pluginOptions' => [ 
                'autoclose' => true, 
                'todayHighlight' => true, 
                'format' => 'yyyy-mm-dd HH:ii:ss', 
            ] 
    ]) ?>
  
    
    
    <?= $form->field($model, 'close')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'high')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'low')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

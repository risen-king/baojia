<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Ad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'place_id')->dropDownList($model->getAllPlaces(),['prompt'=> '请选择']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thumb')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple'=>false
        ],
        'pluginOptions' => [
            'showUpload' => false,
            'showRemove' => false,
            'initialPreview'=> $model->thumb ? $model->thumb : '',
            'initialPreviewAsData'=>true,
            'initialCaption'=>$model->thumb ? $model->thumb : '',
            'initialPreviewConfig' => [
                [
                    //'caption' => 'Moon.jpg',
                    //'size' => '873727'
                ],

            ],
            'overwriteInitial'=>true,
            'maxFileSize'=>2800
        ]
    ]);
    ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

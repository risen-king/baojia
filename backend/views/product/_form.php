<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use pjkui\kindeditor\KindEditor;
use kartik\file\FileInput;
use kartik\datetime\DateTimePicker; 
use kartik\switchinput\SwitchInput;


/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'catid')->dropDownList($model->tree,['prompt'=> '请选择']) ?>

    <?= $form->field($model, 'symbol')->textInput(['maxlength' => true]) ?>

 
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adj_close')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    
    
    <?= $form->field($model, 'onsale')->widget(SwitchInput::classname(), [
            'type' => SwitchInput::CHECKBOX,
                'pluginOptions' => [
                    'onText' => '上架',
                    'offText' => '下架',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ]
        ]); ?>
    
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
    
    

    
    <?= $form->field($model, 'content')->widget( KindEditor::className(),[
                    'clientOptions'=>[
                              'allowFileManager'=>'true',
                              'allowUpload'=>'true',
                              //编辑区域大小
                              'height' => '500',
                              //定制菜单
//                              'items' => [
//                                            'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
//                                            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
//                                            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
//                                            'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
//                                            'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
//                                            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
//                                            'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
//                                            'anchor', 'link', 'unlink', '|', 'about'
//                              ]
                    ]
         ])
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

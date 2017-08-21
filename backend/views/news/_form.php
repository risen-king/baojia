<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pjkui\kindeditor\KindEditor;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
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
    
   
<!--
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

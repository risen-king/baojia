<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pjkui\kindeditor\KindEditor;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($model, 'title')->widget( KindEditor::className(),[
                    'clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true'],
                    'editorType'=>'uploadButton'
         ])
     ?>
     
   <?= $form->field($model, 'content')->widget( KindEditor::className(),[
                    'clientOptions'=>[
                              'allowFileManager'=>'true',
                              'allowUpload'=>'true',
                              //编辑区域大小
                              'height' => '500',
                              //定制菜单
                              'items' => [
                                            'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
                                            'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
                                            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
                                            'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
                                            'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
                                            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
                                            'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
                                            'anchor', 'link', 'unlink', '|', 'about'
                              ]
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

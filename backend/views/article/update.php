<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Article',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
 
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="news-update">
    <?= $this->render('_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

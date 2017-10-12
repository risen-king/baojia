<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdPlace */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Ad Place',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Ad Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="ad-place-update">

    <?= $this->render('../ad/_menu') ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

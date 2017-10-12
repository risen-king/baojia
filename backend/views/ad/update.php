<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ad */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Ad',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="ad-update">

    <?= $this->render('_menu') ?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

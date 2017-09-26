<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Credit */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Credit',
]) . $model->itemid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Credits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itemid, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="credit-update">

       <?= $this->render('_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

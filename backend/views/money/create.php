<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Record */

$this->title = Yii::t('app', 'Create Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Records'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-create">

    <?= $this->render('_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

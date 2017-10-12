<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AdPlace */

$this->title = Yii::t('common', 'Create Ad Place');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Ad Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-place-create">

    <?= $this->render('../ad/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

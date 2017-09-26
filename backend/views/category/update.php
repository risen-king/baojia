<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = \Yii::t('common','Update') .'：'. $model->catname;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
 
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

 <?= $this->render('../product/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

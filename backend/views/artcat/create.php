<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = \Yii::t('common','Create Category'); 
$this->params['breadcrumbs'][] = ['label' => \Yii::t('common','Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

      <?= $this->render('../article/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

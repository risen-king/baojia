<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberGroup */

$this->title = 'Update User Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-group-update">

      <?= $this->render('../member/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MemberGroup */

$this->title = 'Create Member Group';
$this->params['breadcrumbs'][] = ['label' => 'Member Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-group-create">

      <?= $this->render('../member/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

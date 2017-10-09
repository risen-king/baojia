<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MemberGroup */

$this->title = 'Create User Group';
$this->params['breadcrumbs'][] = ['label' => 'User Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-group-create">

      <?= $this->render('../member/_menu') ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

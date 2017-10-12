<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ad */

$this->title = Yii::t('common', 'Create Ad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Ads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-create">

    <?= $this->render('_menu') ?>




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

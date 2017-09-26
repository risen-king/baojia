<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cash */

$this->title = Yii::t('common/cash', 'Update {modelClass}: ', [
    'modelClass' => 'Cash',
]) . $model->itemid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/cash', 'Cashes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itemid, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = Yii::t('common/cash', 'Update');
?>
<div class="cash-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

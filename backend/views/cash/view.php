<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cash */

$this->title = $model->itemid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/cash', 'Cashes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('common/cash', 'Update'), ['update', 'id' => $model->itemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common/cash', 'Delete'), ['delete', 'id' => $model->itemid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common/cash', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'itemid',
            'username',
            'bank',
            'account',
            'truename',
            'amount',
            'fee',
            'addtime:datetime',
            'ip',
            'editor',
            'edittime:datetime',
            'note',
            'status',
        ],
    ]) ?>

</div>

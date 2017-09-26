<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CashSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common/cash', 'Cashes');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginContent('@backend/views/cash/_nav.php') ?>
<div class="cash-index">
 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'truename',
            'itemid',
            'account',
            'fee',
            'bank',
            
            'truename',
            
            'addtime:datetime',
           'edittime:datetime',
           
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php $this->endContent() ?>
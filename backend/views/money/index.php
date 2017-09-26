<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common/money', 'Money Records');
$this->params['breadcrumbs'][] = $this->title;
?>
 
<div class="record-index">

    <?= $this->render('_menu') ?>
 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'itemid',
            [
                'attribute'=>'income',
                'value'=>function($model){
                    if($model->amount>=0){
                        return '<span style="color:blue">'.$model->amount.'</span>';
                    }else{
                        return '';
                    }
                    
                },
                'label'=>Yii::t('common/money','Income'),
                'format'=>'html'
            ],
                    
            [
                'attribute'=>'outcome',
                'value'=>function($model){
                        if($model->amount<0){
                            return '<span style="color:red">'.$model->amount.'</span>';
                        }else{
                            return '';
                        }
                },
                'label'=>Yii::t('common/money','Outcome'),
                'format'=>'html'
            ],
            'balance',
            'bank',
            [
                'attribute'=>'username',
                'visible'=> true
            ],
            'addtime:datetime',
            'reason',
            'note',
        ],
    ]); ?>
</div>
 
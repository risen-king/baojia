<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('money', 'Credit Records');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credit-index">

    
    <?= $this->render('_menu') ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         
            'itemid',
            [
                'attribute'=>'in_amount',
                'value'=>function($model){
                    if($model->amount>=0){
                        return '<span style="color:blue">'.$model->amount.'</span>';
                    }else{
                        return '';
                    }
                    
                },
                'format'=>'html',
                'headerOptions' => ['width' => '50'],
            ],
            [
                'attribute'=>'out_amount',
                'value'=>function($model){
                        if($model->amount<0){
                            return '<span style="color:red">'.$model->amount.'</span>';
                        }else{
                            return '';
                        }
                },
                'format'=>'html',
                'headerOptions' => ['width' => '50'],
            ],
            'balance',
            'created_at',
            'username',
            'editor',
            'reason',
            'note',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FinanceChargeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common/money', 'Finance Charges');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginContent('@backend/views/charge/_nav.php') ?>
<div class="finance-charge-index">
 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'itemid',
                'label'=>Yii::t('common/money','Itemid')
            ],
            
            [
                'attribute'=>'itemid',
                'label'=>Yii::t('common/money','Charge Amount')
            ],
            [
                'attribute'=>'fee',
                'label'=>Yii::t('common/money','Charge Fee')
            ],
            
            
            [
                'attribute'=>'money',
                'label'=>Yii::t('common/money','Real Amount')
            ],
            
            [
                'attribute'=>'money',
                'label'=>Yii::t('common/money','Receivetime')
            ],
           
            
            [
                'attribute'=>'bank',
                'label'=>Yii::t('common/money','Bank'),
                'value'=>function($model){
                    $_status = array('<span style="color:blue;">等待支付</span>', '<span style="color:red;">支付失败</span>', '<span style="color:#FF00FF;">记录作废</span>', '<span style="color:green;">支付成功</span>', '<span style="color:green;">人工审核</span>');
                    return $_status[$model->status];
                },
                
                'format'=>'raw'
            ],
          
            [
                'attribute'=>'status',
                'label'=>Yii::t('common/money','Status'),
                'value'=>function($model){
                    $_status = array('<span style="color:blue;">等待支付</span>', '<span style="color:red;">支付失败</span>', '<span style="color:#FF00FF;">记录作废</span>', '<span style="color:green;">支付成功</span>', '<span style="color:green;">人工审核</span>');
                    return $_status[$model->status];
                },
                'format'=>'html'
            ],
           
            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
<?php $this->endContent() ?>
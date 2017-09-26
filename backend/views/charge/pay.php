<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FinanceCharge */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Finance Charge',
]) . $model->itemid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Charges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itemid, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = Yii::t('app', '账户充值');
?>
<?php $this->beginContent('@backend/views/charge/_nav.php') ?>
<div class="finance-charge-update">
 
        <div class="finance-charge-form">

            <?php $form = ActiveForm::begin([
//                    'type' => ActiveForm::TYPE_HORIZONTAL
               ]); ?>

           
            <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

            
            <?= $form->field($model, 'payment')->radioList($model->avaiPayment)->label(); ?>

            

            <div class="form-group">
                <div class="col-lg-8 col-lg-offset-2">
                <?= Html::submitButton(Yii::t('app', 'Next')  , ['class' => 'btn btn-block btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

</div>
<?php $this->endContent() ?>
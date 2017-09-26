<?php
use yii\helpers\Html;
use common\widgets\ActiveForm;
use common\helper\Money;
 

/* @var $this yii\web\View */
/* @var $model common\models\Cash */

$this->title = Yii::t('common/cash', 'Create Cash');
$this->params['breadcrumbs'][] = ['label' => Yii::t('common/cash', 'Cashes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginContent('@frontend/views/cash/_nav.php') ?>
 


<div class="cash-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>

    <?= $form->field($user, 'bank')->dropDownList(array_merge(['请选择'],Money::cashBank())) ?>

    <?= $form->field($user, 'bank_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'payword')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton( Yii::t('common/cash', 'Update'), ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


 
<?php $this->endContent() ?>
<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $user
 */
?>

 
<?= $form->field($user, 'group_id')->dropDownList($user->groupList)->label(\Yii::t('user', 'Groupname')) ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'nickname')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'mobile')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'money')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'credit')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>


<?= $form->field($user, 'registration_ip')->textInput(['maxlength' => 20, 'readonly' => 'true']) ?>
<?= $form->field($user, 'created_at')->textInput(['maxlength' => 20, 'readonly' => 'true']) ?>
<?= $form->field($user, 'confirmStatus')->textInput(['maxlength' => 20, 'readonly' => 'true']) ?>
<?= $form->field($user, 'blockStatus')->textInput(['maxlength' => 20, 'readonly' => 'true']) ?>






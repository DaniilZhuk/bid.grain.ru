<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;


?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'agent')->dropDownList([
            'Buyer' => Yii::t('app', 'Buyer'),
            'Agent' => Yii::t('app', 'Agent'),
            'Trader' => Yii::t('app', 'Trader'),
            

    ]) ?>

    <?= $form->field($model, 'company_name')->textInput(['type'=>'text','maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['type'=>'text','maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput([ 'type'=>'email', 'maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['type'=>'phone','maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?> -->

<div class="form-group">
 <div>
 <?= Html::submitButton(\Yii::t('app', 'Create account'), ['class' => 'btn btn-success']) ?>
 </div>
</div>
<?php ActiveForm::end() ?>
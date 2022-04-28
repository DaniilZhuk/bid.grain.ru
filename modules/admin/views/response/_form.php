<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Response */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="response-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value' =>$id_user])->label(false) ?>
    <?= $form->field($model, 'id_bid')->hiddenInput(['value' =>$id_bid])->label(false) ?>
    <?= $form->field($model, 'volume')->hiddenInput(['value' =>$volume])->label(false) ?>
    
    <?= $form->field($model, 'price')->textInput(['type'=>'number', 'value'=>$price_max, 'min' => 0, 'step'=>1 ]) ?>

    
    <?= $form->field($model, 'date_start')->hiddenInput([
        'value' => date('Y-m-d'),    
        ])->label(false) ?> 

    <?= $form->field($model, 'date_end')->hiddenInput([
       'value' => date('Y-m-d'),
          ])->label(false) ?> 

        <?php
            $user = User::findOne(['id' => $id_user]);
            if ($user->agent == 'Agent') {
                echo $form->field($model, 'company')->textInput() ;
            } else {
                echo $form->field($model, 'company')->hiddenInput(['value'=>'---'])->label(false) ;
            }
        ?>
    
    <!-- <?= $form->field($model, 'company')->textInput() ?> -->

    <?= $form->field($model, 'comment')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(\Yii::t('app', 'Send'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

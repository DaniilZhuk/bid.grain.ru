<?php
use app\models\BasisList;
use app\models\NomenclatureList;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
// use kartik\date\DatePicker;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Bid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bid-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'volume')->textInput(['style'=>'text-align: left;'])->widget(\yii\widgets\MaskedInput::className(), [
        // 'mask' => '999 999',
        'options' => [
            'autocomplete' => "off",
        ],
        'clientOptions' => [
            'alias' =>  'decimal',
            'groupSeparator' => ' ',
            'autoGroup' => true
        ],
        ]); ?>
            
        <?php
            $authors = BasisList::find()->all();
            if ($authors){
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                $items = ArrayHelper::map($authors,'name','name');
                $params = [
                    'prompt' => 'Select delivery terms'
                ];
                echo $form->field($model, 'basis')->dropDownList($items,$params);
            }            
        ?>

        <?= $form->field($model, 'price')->textInput(['type'=>'number','maxlength' => true, 'step'=>1, 'placeholder'=>'1000']) ?>

        <?php
            $NomenclatureList = NomenclatureList::find()->all();
            if ($NomenclatureList){
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
                $items = ArrayHelper::map($NomenclatureList,'name','name');
                $params = [
                    'prompt' => 'Select product name'
                ];
                echo $form->field($model, 'nomenclature')->dropDownList($items,$params);
            }            
        ?>

        <!-- <?/*= $form->field($model, 'nomenclature')->textInput(['maxlength' => true]) */?> -->

        <?= $form->field($model, 'quality')->textarea(['maxlength' => true, 'rows'=>6]) ?>

        <?= $form->field($model, 'date_from')->textInput(['type' => 'date',   'value' => $model->date_from]) ?>
    
        <?= $form->field($model, 'date_to')->textInput(['type' => 'date',   'value' =>  $model->date_to  ]) ?>
   
        <?= $form->field($model, 'end_date')->textInput(['type' => 'datetime-local',
        'value' => str_replace(date('Y-m-d', strtotime($model->end_date)).' ',
            date('Y-m-d', strtotime($model->end_date)).'T', $model->end_date )]) ?>

        <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton(\Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>

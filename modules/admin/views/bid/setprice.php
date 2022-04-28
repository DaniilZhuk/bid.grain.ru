<?php
use app\models\Bargain;
use app\models\User;
use app\models\Bidding;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

\yii\web\YiiAsset::register($this);

// проверка на админа
$userId = Yii::$app->user->getId();
$user = User::find()->where(['id' => $userId])->one();
$is_admin = $user->is_admin;
if ($is_admin == 1 or $is_admin == 2) {
    $id_admin = $user->id;
}
// var_dump($id_user, $id_sender);die;
?>
<p>Response № <?= $response->id ?> Request No. <?= $response->id_bid ?></p>
<p>Price: <?= $price ?></p>
<p>Bargain: <?= $id_bargain ?></p>
    <?php $form = ActiveForm::begin([
        'action' =>['bid/price-save'], 'id' => 'forum_post',
    ]); ?>
        <?= $form->field($model, 'price')->textInput(['value'=>$price, 'type'=>'number','maxlength' => true, 'step'=>1,  'class' => ' form-control col-lg-2' ]) ?>
        <br>
        <?= $form->field($model, 'comment')->textArea([ 'class' => 'form-control col-lg-4', 'rows'=> 4 ]) ?>
        <?= $form->field($model, 'status')->hiddenInput(['value'=> 0 ])->label(false)  ?>
        <?= $form->field($model, 'id_user')->hiddenInput(['value'=> $response->id_user ])->label(false)  ?>
        <?= $form->field($model, 'id_response')->hiddenInput(['value'=> $response->id ])->label(false)  ?>
        <?= $form->field($model, 'id_sender')->hiddenInput(['value'=> $id_sender ])->label(false)  ?>

        <?= $form->field($model, 'id_bargain')->hiddenInput(['value'=> $id_bargain ])->label(false)  ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
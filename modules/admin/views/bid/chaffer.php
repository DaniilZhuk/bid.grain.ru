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
$user_info = User::find()->where(['id' => $response->id_user])->one();
$user_info->fio;
?>


<p>Отклик № <?= $response->id ?> от пользователя: <?= $user_info->fio; ?> (id:<?= $response->id_user; ?>) </p>

<p>на заявку № <?= $response->id_bid ?></p>
<p>Цена пользователя: <?= $response->price ?></p>

<p>Предложить свою цену:</p>
    <?php $form = ActiveForm::begin([
        'action' =>['bid/chaffer-save'], 'id' => 'forum_post', 'method' => 'post'
    ]); ?>
        <?= $form->field($model, 'admin_price')->textInput(['value'=>$response->price, 'type'=>'number','maxlength' => true, 'step'=>1,  'class' => ' form-control col-lg-2' ]) ?>
        <br>
        <?= $form->field($model, 'comment')->textArea([ 'class' => 'form-control col-lg-4', 'rows'=> 4 ]) ?>

        <?= $form->field($model, 'id_user')->hiddenInput(['value'=> $response->id_user ])->label(false)  ?>
        <?= $form->field($model, 'id_admin')->hiddenInput(['value'=> $id_admin ])->label(false)  ?>
        <?= $form->field($model, 'id_bid')->hiddenInput(['value'=> $response->id_bid ])->label(false)  ?>
        <?= $form->field($model, 'id_response')->hiddenInput(['value'=> $response->id ])->label(false)  ?>
        <?= $form->field($model, 'user_price')->hiddenInput(['value'=> $response->price ])->label(false)  ?>
        
       
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
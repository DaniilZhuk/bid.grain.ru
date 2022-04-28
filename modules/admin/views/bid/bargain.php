<?php
use app\models\User;
use app\models\Bargain;
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

// сюда при первом заходе 
$bargains = Bargain::find()
->where(['id_user' => $model->id_user])
->andWhere(['id_response' => $model->id])
->orderBy(['id' => SORT_DESC])
->all();
echo 'Response №'.$model->id. '<br>';
if ($bargains){
    
    foreach($bargains as $bargain) {

        $user_new = User::find()->where(['id' => $bargain->id_sender])->one();
        if ($user_new->is_admin == 1 or $user_new->is_admin == 2 ){
            if ($is_admin == 1 or  $is_admin == 2) { 
                echo '<p>Admin price: <b>'.$bargain->price.'$</b>. Comment: '.$bargain->comment ;
                echo '<p>-----------------------</p>';
            } else {
                echo '<p>Admin suggested a new price: <b>'.$bargain->price.'$</b> ' ;
                echo 'Comment: '.$bargain->comment.'<br>' ;
                if($bargain->status == 0) {
                    echo Html::a(\Yii::t('app', 'Accept'), ['accept', 'id' => $bargain->id, 'price'=>$bargain->price ], ['class' => 'btn btn-success']);
                    echo '</p>';               
                    echo Html::a(\Yii::t('app', 'Counter offer'), ['setprice', 'id_bargain' => $bargain->id, 'id_user' => $model->id_user, 'id_response'=>$model->id, 'id_sender'=>$userId , 'price' => $bargain->price], ['class' => 'btn btn-primary']);    
                }
                // echo Html::a(\Yii::t('app', 'Accept'), ['accept', 'id' => $bargain->id, 'price'=>$bargain->price ], ['class' => 'btn btn-success']);
                // echo '</p>';               
                // echo Html::a(\Yii::t('app', 'Counter offer'), ['setprice', 'id_bargain' => $bargain->id, 'id_user' => $model->id_user, 'id_response'=>$model->id, 'id_sender'=>$userId , 'price' => $bargain->price], ['class' => 'btn btn-primary']);
                echo '<p>-----------------------</p>';
            }
        } else {
            if ($is_admin == 1 or  $is_admin == 2) { 
                echo '<p>User price: <b>'.$bargain->price.'$</b>. Comment: '.$bargain->comment ;
                if($bargain->status == 0) {
                    echo Html::a(\Yii::t('app', 'Accept'), ['accept', 'id' => $bargain->id, 'price'=>$bargain->price ], ['class' => 'btn btn-success']);
                    echo '</p>';               
                    echo Html::a(\Yii::t('app', 'Counter offer'), ['setprice', 'id_bargain' => $bargain->id, 'id_user' => $model->id_user, 'id_response'=>$model->id, 'id_sender'=>$userId , 'price' => $bargain->price], ['class' => 'btn btn-primary']);    
                }
                // echo Html::a(\Yii::t('app', 'Accept'), ['accept', 'id' => $bargain->id, 'price'=>$bargain->price], ['class' => 'btn btn-success']);
                // echo '</p>';               
                // echo Html::a(\Yii::t('app', 'Counter offer'), ['setprice', 'id_bargain' => $bargain->id, 'id_user' => $model->id_user, 'id_response'=>$model->id, 'id_sender'=>$userId , 'price' => $bargain->price], ['class' => 'btn btn-primary']);
                echo '<p>-----------------------</p>';
            } else {
                echo '<p>My new offer: <b>'.$bargain->price.'$</b>. Comment: '.$bargain->comment ;
                echo '<p>-----------------------</p>';
               
            }
        }


       
       
       
       
    }    
} else {
    echo 'There is no counter offer for this response.';
    if ($is_admin == 1 or $is_admin == 2) {
        echo Html::a(\Yii::t('app', 'Set price'), ['setprice','id_bargain'=>1, 'id_user' => $model->id_user, 'id_response'=>$model->id, 'id_sender'=>$userId, 'price' => $model->price ], ['class' => 'btn btn-primary']);
    }    
}

?>

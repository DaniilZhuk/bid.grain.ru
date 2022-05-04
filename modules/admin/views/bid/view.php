<?php

use app\models\Bargain;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// проверка на админа
$userId = Yii::$app->user->getId();
$user = User::find()->where(['id' => $userId])->one();
$is_admin = $user->is_admin;


if (isset($_POST['chek'])) {
    foreach ($_POST['chek'] as $chek) {
        $connection = Yii::$app->db;
        $connection->createCommand()->update('response', ['signed' => 1], 'id=' . $chek)->execute();
    }
}

?>
<div class="bid-view">
        <h1><?= \Yii::t('app', 'Request No.') ?>: <?= Html::encode($this->title) ?></h1>
    <?php
    $dateBidEnd = $model->end_date;
    $now = date('Y-m-d H:i:s',  time());

    if ($now < $dateBidEnd) {
        echo '<h3>'.\Yii::t('app', 'Until the deadline for applications is left').': ';
        echo \russ666\widgets\Countdown::widget([
            'datetime' =>  $dateBidEnd,
            'format' => '%-D days  %H:%M:%S',
            'events' => [
                'finish' => 'function(){location.reload()}',
            ],
        ]);
        echo '</h3>';

        if ($is_admin != 1 and $is_admin != 2) {
            echo Html::a(\Yii::t('app', 'Set bid'), ['createbid', 'id_bid' => $model->id], ['class' => 'btn btn-primary']);
            echo '<p> </p>';
            echo Html::a(\Yii::t('app', 'Buy now'), ['buy-now', 'id_bid' => $model->id , 'id_user' => $userId], ['class' => 'btn btn-info']);
        }
    } else {
        if ($is_admin == 1 or $is_admin == 2) {
           echo '  <a href="#" onClick="window.print()" class="btn btn-primary"> Распечатать </a>';
        }
    }

    ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'detail_new'],
        'attributes' => [
            //'id',
            //'basis',
            'nomenclature',
            'volume',
            'price',
            'basis',
            //'logistic',
            'date_from',
            'date_to',
            'quality',
            'comment',
            'end_date',
        ],
    ]) ?>



</div>

<?php $form = ActiveForm::begin([
    'id' => 'add_otkl',
    'options' => ['class' => 'form-horizontal'],
]); ?>


<?php
foreach ($responses as $response) {
    $company = $response->company;
    $signed = $response->signed;
    $price = $response->price;
    $id_user = $response->id_user;
    if ($users = User::find()->where(['id' => $id_user])->one()) {
        // получаем св-во
        $user = $users->fio;
        $agent = $users->agent;
        $user_id = $users->id;
        $user_company_name = $users->company_name;
        $user_inn = $users->inn;
    } else {
        $user = " ";
        $agent = " ";
        $user_id = 0;
        $user_company_name = " ";
        $user_inn=' ';
    }

    if ($model->id_response_winner == $response->id ){ 
        if ($is_admin == 1 or $is_admin == 2 or $userId == $id_user ) {
            echo '<div class="resp" style="border: 5px solid #0cb503">';
            echo '<p class="winner">WINNER</p>';
        }else {
            echo '<div class="resp">';  
        }
    } else {
        echo '<div class="resp">';   
    }
?>
    
        <div class="resp115">
            <b><?= \Yii::t('app', 'Price $') ?>:</b> <?= $response->price ?> 
            <?php  
             if ($userId == $user_id ) { 
                $bargain = Bargain::find()
                ->where(['id_user' => $user_id])
                ->andWhere(['id_response'=> $response->id])
                ->andWhere(['status'=> 0])
                ->andWhere(['!=','id_sender', $user_id ])
                ->one();
                
                echo '<p>(Set by me) </p>' ;  
                if ($bargain){
                    echo 'There is a counter offer from Admin, PRICE: ';              
                    echo $bargain->price;
                    echo ' $ ';
                }
                echo Html::a(\Yii::t('app', 'Counteroffer'), ['bargain', 'id_response' => $response->id ], ['class' => 'btn btn-info']);
             }
            ?>            
        </div>      
        <?php  if ($is_admin == 1 or $is_admin == 2) {    ?>
            <div class="resp11"><b><?= \Yii::t('app', 'Comments') ?>: </b><br> <?= $response->comment ?></div>
            <div class="resp11"><b><?= \Yii::t('app', 'Supplier’s name') ?>: </b><br> <?= $response->company ?></div>
            <div class="resp11"><b><?= \Yii::t('app', 'Full name') ?>: </b><br> <?= Html::a($user, ['/admin/user/view', 'id' => $user_id], ['class' => 'a_fio']) ?> (<?= $agent ?>) </div>
            <div class="resp11"><b><?= \Yii::t('app', 'Company') ?>: </b><br> <?= $user_company_name ?></div>
            <div class="resp11"><b><?= \Yii::t('app', 'Taxpayer Identification Number') ?>: </b><br> <?= $user_inn ?></div>
            <div class="resp115">
                
                <?php 
                    if ($model->id_response_winner == 0){ 
                        echo Html::a(\Yii::t('app', 'Counteroffer'), ['bargain', 'id_response' => $response->id ], ['class' => 'btn btn-warning']);
                        echo Html::a(\Yii::t('app', 'Select a winner'), ['winner-now', 'id_bid' => $model->id , 'price' =>  $price, 'id_response_winner'=>$response->id], ['class' => 'btn btn-success ml_20']);
                    } 
                ?>
                
            </div>
        <?php   }    ?>
    </div>
<?php  }  ?>
<?php ActiveForm::end(); ?>
<script>
    $('#add_otkl input:checkbox:checked').each(function() {
        alert($(this).val());
    });
</script>
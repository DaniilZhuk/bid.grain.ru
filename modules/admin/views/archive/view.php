<?php

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

    <?php
    if ($is_admin == 1 or $is_admin == 2) {
    ?>
        <h1>Ценовой комитет №______ от <?= date('d-m-Y') ?></h1>
    <?php

    } else {
    ?>
        <h1><?= \Yii::t('app', 'Request No.') ?>: <?= Html::encode($this->title) ?></h1>
    <?php
    }
    ?>
    <?php
    $dateBidEnd = $model->end_date;
    $now = date('Y-m-d H:i:s',  time());

    if ($now < $dateBidEnd) {
        echo '<h3>'.\Yii::t('app', 'Until the deadline for applications is left').': ';
        echo \russ666\widgets\Countdown::widget([
            'datetime' =>  $dateBidEnd,
            'format' => '%-D дней  %H:%M:%S',
            'events' => [
                'finish' => 'function(){location.reload()}',
            ],
        ]);
        echo '</h3>';

        if ($is_admin != 1 and $is_admin != 2) {
            echo Html::a('Оставить предложение', ['createbid', 'id_bid' => $model->id], ['class' => 'btn btn-primary']);
        }
    } else {
        if ($is_admin == 1 or $is_admin == 2) {
            //echo Html::a('Печать PDF', ['printbid', 'id_bid' => $model->id], ['class' => 'btn btn-primary']);
            // echo Html::button('Button 3', [ 'class' => 'btn btn-primary', 'onclick' => '(function ( $event ) { $("body").print(/*options*/); })();' ]);
            echo '  <a href="#" onClick="window.print()" class="btn btn-primary"> Распечатать </a>';
            //   echo Html::a('<i class="fa far fa-hand-point-up"></i> Privacy Statement', ['/bid/printbid'], [
            //     'class'=>'btn btn-danger', 
            //     'target'=>'_blank', 
            //     'data-toggle'=>'tooltip', 
            //     'title'=>'Will open the generated PDF file in a new window'
            // ]);

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
            'volume',
            'price',
            //'logistic',
            'nomenclature',
            'end_date',
            //'quality',
            'comment',
        ],
    ]) ?>



</div>

<?php $form = ActiveForm::begin([
    'id' => 'add_otkl',
    'options' => ['class' => 'form-horizontal'],
]); ?>

<!-- <form id="w1" action="/admin/bid/create" method="post"> 
        <input type="hidden" name="_csrf" value="NNWGw3S761CvD2q5AiTK9f9UqfZM_Bf3VSxlxxY-2tlDlrGXB96PZMV9AY82ZbKBjz7ctCK9RbINe1HxQWu1qw=="> 
     -->
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
    } else {
        $user = " ";
        $agent = " ";
        $user_id = 0;
        $user_company_name = " ";
    }


    //   if ($agent==1) {
    //       $agent = 'Агент';
    //   } else {
    //     $agent = 'Не агент';
    //   }


?>
    <div class="resp">
        <!-- <b>Объем:</b>   <?= $response->volume ?><br> -->
        <div class="resp11"><b>Цена:</b> <?= $response->price ?></div>
        <!-- <div class="resp11"><b>Срок поставки:</b><br> с <?= $response->date_start ?><br> по <?= $response->date_end ?> </div> -->
        <div class="resp11"><b>Логистика:</b><br> <?= $response->logistic ?></div>

        <?php
        if ($is_admin == 1 or $is_admin == 2) {
        ?>
            <div class="resp11"><b>Дополнительные условия поставки:</b><br> <?= $response->comment ?></div>
            <div class="resp11"><b>Наименование поставщика:</b><br> <?= $response->company ?></div>
            <div class="resp11"><b>ФИО:</b><br> <?= Html::a($user, ['/admin/user/view', 'id' => $user_id], ['class' => 'a_fio']) ?> (<?= $agent ?>) </div>
            <div class="resp11"><b>Наименование организации:</b><br> <?= $user_company_name ?></div>

            <!-- <?php if ($signed == 1) { ?>
                <input type="checkbox" name="chek[]" checked value="<?= $response->id ?>" >
            <?php   } else {  ?>
                <input type="checkbox" name="chek[]" value="<?= $response->id ?>" >
            <?php   }  ?> -->

        <?php
        }
        ?>
    </div>

<?php

}
?>

<?php
if ($is_admin == 1 or $is_admin == 2) {
?>
    <div class="writes_ck">
        <h3>Подписанты ЦК: </h3>
        <p class="writes_ck_p">___________________ Барабанов Д.Н.</p>
        <p class="writes_ck_p">___________________ Ильюшин И.Н.</p>
        <p class="writes_ck_p">___________________ Ерлыга Н.Ю.</p>
    </div>
<?php

}
?>
<?php ActiveForm::end(); ?>
<script>
    $('#add_otkl input:checkbox:checked').each(function() {
        alert($(this).val());
    });
</script>
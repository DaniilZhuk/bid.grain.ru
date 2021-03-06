<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\User;
use app\models\Bid;
use app\models\Response;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'Responses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="response-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Response', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_user',
            'price',
            'id_bid',
            'volume',
            'logistic',
            // 'date_start',
            // 'date_end',
           // 'bid.basis',
            'user.fio',
            'company',
            'user.company_name',
            //'bid.nomenclature',
            'comment',
            [
                'class' => ActionColumn::className(),
                // {view} {update} {delete}
                'template' => '{delete}',
                'visibleButtons' => [
                    'update' => function ($data) {
                        $userId = Yii::$app->user->getId();
                        $user = User::find()->where(['id' => $userId])->one();
                        $is_admin = $user->is_admin;
                        // var_dump($is_admin);die;
                        return ($is_admin == 1 or $is_admin == 2);
                    },
                    'delete' => function ($data) {
                        $userId = Yii::$app->user->getId();
                        $user = User::find()->where(['id' => $userId])->one();
                        $is_admin = $user->is_admin;
                        // var_dump($is_admin);die;
                        return $is_admin == 1 or $is_admin == 2;
                    },
                ]
            ],
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Response $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
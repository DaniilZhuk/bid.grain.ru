<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\NomenclatureList;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchNomenclatureList */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomenclature Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nomenclature List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NomenclatureList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

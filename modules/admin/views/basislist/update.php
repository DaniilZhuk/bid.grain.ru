<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasisList */

$this->title = 'Update Basis List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Basis Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="basis-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

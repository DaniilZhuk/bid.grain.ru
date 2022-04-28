<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasisList */

$this->title = 'Create Basis List';
$this->params['breadcrumbs'][] = ['label' => 'Basis Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="basis-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

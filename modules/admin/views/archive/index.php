<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\User;
use app\models\Bid;
use app\models\Response;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Архив заявок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        // $query = Bid::find()->where(['<','end_date', $date_from])->orderBy(['id'=>SORT_DESC]) ;
        // $date_name = date('Y-m-d');
        
        // $date_from = date('Y-m-d 23:59:59', strtotime($date_now. " - 1 day"));
        // $date_to = date('Y-m-d 00:00:01', strtotime($date_now. " + 1 day"));

        // foreach( $dates as $data)
        // {
        //     echo '<a href="/admin/archive?data=$data"> $data </a>';
        // }
    
    ?>

<?php 

$date_now = date('Y-m-d H:i:s');

function generateButtons($date_now)
{   
    $date_open = '2022-04-12 00:00:00';
    $date_name_button = '2022-04-12';

    while($date_open < $date_now)
    {
        $date_from = date('Y-m-d 23:59:59', strtotime($date_open. " - 1 day"));
        $date_to = date('Y-m-d 00:00:01', strtotime($date_open. " + 1 day"));      
        echo Html::a('Архив заявок за '.$date_name_button, ['dateofarchive', 'date_start' => $date_from,  'date_end' => $date_to], ['class' => 'button_archive']);
        $date_open =  date('Y-m-d 00:00:01', strtotime($date_open. " + 1 day"));
        $date_name_button =  date('Y-m-d', strtotime($date_name_button. " + 1 day"));
    }
} 
    generateButtons($date_now);  
?>  
   
</div>

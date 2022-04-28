<?php

namespace app\modules\admin\controllers;

use app\models\Bid;
use app\models\BidSearch;
use app\models\Bidding;
use app\models\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use Yii;

/**
 *  BiddingController implements the CRUD actions for  Bidding model.
 */
class  BiddingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all  Bidding models.
     *
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $searchModel = new  BiddingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'is_admin' => $is_admin,
            'user' => $user,
        ]);
    }

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
 * BidController implements the CRUD actions for Bid model.
 */
class BidController extends Controller
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
     * Lists all Bid models.
     *
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $searchModel = new BidSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bid model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
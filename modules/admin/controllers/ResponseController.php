<?php

namespace app\modules\admin\controllers;

use app\models\Bid;
use app\models\Response;
use app\models\ResponseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use Yii;
/**
 * ResponseController implements the CRUD actions for Response model.
 */
class ResponseController extends Controller
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
     * Lists all Response models.
     *
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $searchModel = new ResponseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Response model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        // $res = Response::find()->where(['id'=>$id])->one();
       
        // $id_bid = $res->id_bid;
        
        // $responses = Response::find()->where(['id_bid'=>$id_bid])->all();
        
        // $bid = Bid::find()->where(['id'=>$id_bid])->one();
        // return $this->render('/bid/view', [
        //     'model' =>  $bid,
        //     'responses' => $responses,
        // ]);
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        return $this->redirect(['/admin/bid']);
        // return $this->render('/bid' ]);
    }

    /**
     * Creates a new Response model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {   
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $id_user =  Yii::$app->user->getId();
        $id_bid = $this->request->get('id');
        $bid_price_max = Bid::find()->where(['id'=>$id_bid])->one() ;
        $price_max = $bid_price_max->price;
        $volume = $bid_price_max->volume;
        //var_dump($volume);die;
       // var_dump($bid_price_max->price);die;

        $model = new Response();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'id_bid'=>$id_bid,
            'id_user'=>$id_user,
            'price_max'=> $price_max ,
            'volume'=> $volume ,
            
        ]);
    }

    /**
     * Updates an existing Response model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $model = $this->findModel($id);
        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
       
        return $this->render('update', [
            'model' => $model,
            'id_bid'=>$model->id_bid,
            'id_user'=>$model->id_user,
            'price_max'=> $model->price ,
            'volume'=> $model->volume ,
        ]);
    }

    /**
     * Deletes an existing Response model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Response model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Response the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        if (($model = Response::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

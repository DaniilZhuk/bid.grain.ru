<?php

namespace app\modules\admin\controllers;

use app\models\Bargain;
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

        $userId = Yii::$app->user->getId();
        $user = User::find()->where(['id' => $userId])->one();
        $is_admin = $user->is_admin;
        // $date_now = date('Y-m-d H:i:s');
        // var_dump($date_now);die;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'is_admin' => $is_admin,
            'user' => $user,
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
        $responses = Response::find()->where(['id_bid' => $id])->orderBy(['price' => SORT_DESC])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'responses' => $responses,
        ]);
    }

    /**
     * Creates a new Bid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $model = new Bid();
        // $bid = $this->request->post();
        // var_dump($bid['Bid']['logistic']);die;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




    public function actionCreateBids()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $c = 3;
        $v = 5;
        while ($c >= 1) {
            while ($v >= 1) {
                $model = new Bid();
                $model->basis = self::countBasis($c);
                $model->volume = self::countVolume($v);
                $model->price = '105';
                $model->nomenclature = ['Масло подсолнечное нерафинированное промышленной переработки / Масло подсолнечное нерафинированное первого сорта'];
                $model->end_date = date('Y-m-d 14:00:00'); //  date('Y-m-d 14:00:00')
                $v--;
                $model->save();
            }
            $v = 5;
            $c--;
        }
        return $this->redirect(['index']);
    }
    public function countVolume($v)
    {
        if ($v == 5) {
            $volume = '1 000';
        } elseif ($v == 4) {
            $volume  = '500';
        } elseif ($v == 3) {
            $volume  = '300';
        } elseif ($v == 2) {
            $volume  = '200';
        } elseif ($v == 1) {
            $volume  = '100';
        }
        return $volume;
    }
    public function countBasis($c)
    {
        if ($c == 3) {
            $company = 'ОАО "МЖК Краснодарский" (г. Краснодар. ул. Тихорецкая 5)';
        } elseif ($c == 2) {
            $company  = 'Юг Руси, АО (г. Ростов-на-Дону, ул. Луговая, 9)';
        } elseif ($c == 1) {
            $company  = 'ЮР Лабинский МЭЗ ф-л, ООО (Краснодарский кр., г.Лабинск, ул.Красная, 100)';
        }
        return $company;
    }

    /**
     * Updates an existing Bid model.
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
        ]);
    }

    /**
     * Deletes an existing Bid model.
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
     * Finds the Bid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Bid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        if (($model = Bid::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCreatebid($id_bid)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        return $this->redirect(['response/create', 'id' => $id_bid]);
    }

    public function actionBuyNow($id_bid,$id_user)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        
        $model =  $this->findModel($id_bid);
        $model->end_date = date('Y-m-d 01:00:00');

        $response = new Response;
        $response->id_user = $id_user;
        $response->price = $model->price;
        $response->id_bid = $id_bid;
        $response->volume = $model->volume;
        $user_agent = User::find()->where(['id'=>$id_user])->one() ;
        if ($user_agent->agent == 'Agent' ) {
            $response->company = 'Agent:'. $user_agent->fio;
        } else {
            $response->company = "-----";
        }
        if ($response->save() && $model->save() ) {
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            var_dump('Что-то пошло не так, свяжитесь с нами') ; die;
        }

    }


    public function actionWinnerNow($id_bid,$price,$id_response_winner)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        
        $model =  $this->findModel($id_bid);
        $model->end_date = date('Y-m-d 01:00:00');
        //$model->price = $price;
        $model->id_response_winner = $id_response_winner;
        // $winner = 'YES';
       
        if ($model->save() ) {
                return $this->redirect(['view', 'id' => $model->id]);
        } else {
            var_dump('Что-то пошло не так, свяжитесь с нами') ; die;
        }

    }
    public function actionChaffer($id){
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;

        $response = Response::find()->where(['id' => $id])->one()   ;
        $model = new Bidding;

       // echo '<pre>'; var_dump($response); echo '</pre>'; die;
        
        return $this->render('chaffer', [
            'response' => $response,
            'model'=>$model,
        ]);
    }

    public function actionChafferSave(){
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;

        $model = new Bidding();   
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bid]) ;
        } else {
            var_dump('Что-то пошло не так'); die; 
        }        
    }

    public function actionAccept( $id, $price ){
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;   

        // Обновление записи из таблицы Bargain чтобы не выводить админскую цену и установить статус 1-подтверждено
        $bargain = Bargain::find()->where(['id' => $id])->one();
        $bargain->status =  1;
        // Обновление отклика из таблицы Response чтобы вывести цену которую клиент подтвердил
        $response = Response::find()->where(['id' => $bargain->id_response])
        ->orderBy(['price' => SORT_DESC])
        ->one();
        $response->price =  $price;       
        if ($bargain->save() && $response->save()) {
            return $this->redirect(['view', 'id' => $response->id_bid]) ;
        }
    }
    public function actionBargain($id_response)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $model = Response::find()->where(['id' => $id_response])->one();
        return $this->render('bargain', [
            'model' => $model,
        ]);
    }
    public function actionSetprice($id_bargain,$id_user, $id_response, $id_sender,$price)
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
         
        $response = Response::find()->where(['id' => $id_response])->one();
        $model = new Bargain(); 
        return $this->render('setprice', [
            'response'=>$response,
            'model' => $model,
            'id_bargain'=>$id_bargain,
            'id_user'=> $id_user,
            'id_sender'=>$id_sender,
            'price'=>$price,
            
        ]);
    }
    
    public function actionPriceSave(){

        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
       
        $bargain = new Bargain();   
        $id_response = $this->request->post('Bargain')['id_response'];//id_bargain
        $id_bargain = $this->request->post('Bargain')['id_bargain'];

         // Обновление записи из таблицы Bargain чтобы не выводить админскую цену и установить статус 1-подтверждено
         $bargain_new = Bargain::find()->where(['id' => $id_bargain])->one();
         
         if ($bargain_new){
            $bargain_new->status =  1;
            $bargain_new->save();
         }

        if ($bargain->load($this->request->post()) && $bargain->save()  ) {
            $model = Response::find()->where(['id' => $id_response ])->one();
            return $this->redirect(['bargain', 'id_response' => $id_response]) ;
        } else {
            var_dump('Что-то пошло не так'); die; 
        }
        

    }

}

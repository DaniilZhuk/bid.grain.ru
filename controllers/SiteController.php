<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Bid;
use app\models\SignupForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin/user');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
            return $this->redirect('/admin/user');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin/user');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
            return $this->redirect('/admin/user');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        \Yii::$app->language = isset($_SESSION['language']) ? $_SESSION['language'] : null;


        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin/user');
        }
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();

            $user->fio = $model->fio;
            $user->agent = $model->agent;
            $user->inn = $model->inn;
            $user->company_name = $model->company_name;
            $user->mail = $model->mail;
            $user->tel = $model->tel;
            $user->username = $model->username;
            $user->password = $model->password; //\Yii::$app->security->generatePasswordHash(

            $user->authKey = $model->authKey;
            $user->accessToken = $model->accessToken;
            if ($user->save()) {
                return $this->redirect('/admin/user');
            }
        }

        return $this->render('signup', compact('model'));
    }
    public function actionChangeLang($local)
    {


        $available_locales = [
            'ru-RU',
            'en-US'
        ];

        if (!in_array($local, $available_locales)) {
            throw new \yii\web\BadRequestHttpException();
        }

        \Yii::$app->language = $local;

      
        $session = Yii::$app->session;
        $session->set('language', $local);
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        //return $this->goBack();
    }
}
<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Jurusan;
use app\models\LoginForm;
use app\models\Mahasiswa;
use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use const YII_ENV_TEST;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
    public function actions() {
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
    public function actionIndex() {
        $this->layout = "mainHome";
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $model->password = '';
            return $this->renderAjax('login', [
                        'model' => $model,
            ]);
        } else {

            Yii::$app->session->setFlash("warning", "Gunakan menu <b>Login</b> pada <b>Sidebar</b>.");
            return $this->render('index');
        }
    }

    public function actionSignup() {
        $this->layout = "mainHome";
        $model = new SignupForm();
        $modelMhs = new Mahasiswa();
        $authItems = ArrayHelper::map(Jurusan::find()->all(), 'kode_jurusan', 'nama_jurusan');

        if ($model->load(Yii::$app->request->post()) && $modelMhs->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {

                $sqlMahasiswa = "insert into prd_mahasiswa (nim,nama,tlp,kode_jurusan,id_user) values (:nim,:nama,:tlp,:kode_jurusan,:id_user)";
                $paramsMahasiswa = [":nim" => $user->username, ":nama" => $modelMhs->nama, ":tlp" => $modelMhs->tlp, ":kode_jurusan" => $modelMhs->kode_jurusan, ":id_user" => $user->id];
                \Yii::$app->db->createCommand($sqlMahasiswa)->bindValues($paramsMahasiswa)->execute();
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('signup', [
                        'model' => $model,
                        'modelMhs' => $modelMhs,
                        'authItems' => $authItems,
            ]);
        } else {
            Yii::$app->session->setFlash("warning", "Gunakan menu <b>Register</b> pada <b>Sidebar</b>.");
            return $this->render('index');
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
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
    public function actionAbout() {
        return $this->render('about');
    }

}

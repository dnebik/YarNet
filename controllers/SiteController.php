<?php

namespace app\controllers;

use app\models\FillForm;
use app\models\FillHistory;
use app\models\Tank;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

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

    public function actionIndex()
    {
        $model = new FillForm();

        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                $history = new FillHistory();
                $history->employee = $model->employee;
                $history->tank = $model->id_tank;
                $history->liters = $model->liters;

                $tank = Tank::getTankByIdentity($model->id_tank);
                $tank->addFullness($model->liters);

                $history->save();

                $model = new FillForm();
            }
        }

        $tanks = Tank::getAll();
        $fillHistory = FillHistory::getAll();

        return $this->render('index', compact(['model', 'tanks', 'fillHistory']));
    }
}

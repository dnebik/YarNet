<?php

namespace app\controllers;

use app\models\FillForm;
use app\models\FillHistory;
use app\models\Tank;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        //СОЗДАНИЕ МОДЕЛИ
        $model = new FillForm();

        //ЗАГРУЗКА МОДЕЛИ
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate()) //ВЕРИФИКАЦИЯ
            {
                //ЗАПИСЬ ИСТОРИИ
                $history = new FillHistory();
                $history->employee = $model->employee;
                $history->tank = $model->id_tank;
                $history->liters = $model->liters;

                //ДОБАВЛЕНИЕ КОЛИЧЕСТВА МОЛОКА В ЦИСТЕРНУ
                $tank = Tank::getTankByIdentity($model->id_tank);
                $tank->addFullness($model->liters);

                //СОХРАНЕНИЕ ИСТОРИИ ЗАПОЛНЕНИЯ
                $history->save();

                //РЕДИРЕКТ
                return $this->redirect('');
            }
        }
        //ЗАГРУЗКА МОДЕЛИ

        //ДАННЫЕ ДЛЯ ВЬЮШКИ
        $tanks = Tank::getAll();
        $fillHistory = FillHistory::getAll();
        //

        //РЕНДЕРИМ ВЬЮШКУ И ОТПРАВЛЯЕМ ЕЙ МОДЕЛЬ И ДАННЫЕ
        return $this->render('index', compact(['model', 'tanks', 'fillHistory']));
    }
}

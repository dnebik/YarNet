<?php

namespace app\models;

use yii\base\Model;

class FillForm extends Model
{
    public $id_tank;
    public $employee;
    public $liters;

    public function rules()
    {
        return [
            //НАВСЯКИЙ ПРОВЕРЯЕМ ИНДЕФИКАТОР ЦИСТЕРНЫ
            ['id_tank', 'exist', 'targetClass' => Tank::class, 'targetAttribute' => ['id_tank' => 'id']],
            //ВСЕ ПОЛЯ НЕ ПУСТЫЕ
            [['id_tank', 'employee', 'liters'], 'required'],
            //ОГРАНИЧЕНИЕ ДЛИННЫ ИМЕНИ
            ['employee', 'string', 'length' => [1, 255]],
            //ОГРАНИЧЕНИЕ ЧИСЛА ЛИТРОВ
            ['liters', 'integer', 'max' => 300, 'min' => 1]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_tank' => 'Номер цистерны',
            'employee' => 'Сотрудник',
            'liters' => 'Литры',
        ];
    }

}
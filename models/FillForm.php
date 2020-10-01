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
            ['id_tank', 'exist', 'targetClass' => Tank::class, 'targetAttribute' => ['id_tank' => 'id']],
            [['id_tank', 'employee', 'liters'], 'required'],
            ['id_tank', 'integer', 'message' => 'Ни одна цистерна не подошла'],
            ['employee', 'string', 'length' => [5, 255]],
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
<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fill_history".
 *
 * @property int $id
 * @property int $tank
 * @property string $employee
 * @property int $liters
 * @property string $date
 */
class FillHistory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'fill_history';
    }

    public function rules()
    {
        return [
            [['tank', 'employee', 'liters'], 'required'],
            [['tank', 'liters'], 'integer'],
            [['date'], 'safe'],
            [['employee'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tank' => 'Tank',
            'employee' => 'Employee',
            'liters' => 'Liters',
            'date' => 'Date',
        ];
    }

    public static function getAll()
    {
        return self::find()->orderBy('date DESC')->all();
    }
}

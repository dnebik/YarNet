<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tank".
 *
 * @property int $id
 * @property int $fullness
 * @property int $quantity
 */
class Tank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullness', 'quantity'], 'integer'],
            [['quantity'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullness' => 'Fullness',
            'quantity' => 'Quantity',
        ];
    }

    public function addFullness(int $value)
    {
        $fullness = $this->fullness;
        $this->fullness = $fullness + $value;
        return $this->save();
    }

    public static function getAll()
    {
        return self::find()->orderBy('id ASC')->all();
    }

    public static function getTankByIdentity(int $id)
    {
        return self::findOne(['id' => $id]);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $price
 * @property int|null $speed
 */
class Tariffs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'speed'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'speed' => 'Speed',
        ];
    }
}

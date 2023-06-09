<?php

namespace app\modules\content\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 *
 * @property Orders[] $orders
 */
class Dishes extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['dish_id' => 'id']);
    }


    static function getReadyDishes()
    {
        return self::find()->where(['is_ready' => true])->asArray()->all();
    }

}

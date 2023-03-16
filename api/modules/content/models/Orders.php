<?php

namespace app\modules\content\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $dish_id
 * @property int|null $chef_id
 * @property int|null $created_at
 *
 * @property Chefs $chef
 * @property Dishes $dish
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_id', 'order_number', 'chef_id', 'created_at'], 'default', 'value' => null],
            [['dish_id', 'order_number', 'chef_id', 'created_at'], 'integer'],
            [['dish_id', 'order_number', 'chef_id', 'created_at'], 'required'],
            [['chef_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chefs::class, 'targetAttribute' => ['chef_id' => 'id']],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::class, 'targetAttribute' => ['dish_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_number' => 'Order Number',
            'dish_id' => 'Dish ID',
            'chef_id' => 'Chef ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Chef]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChef()
    {
        return $this->hasOne(Chefs::class, ['id' => 'chef_id']);
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dishes::class, ['id' => 'dish_id']);
    }
}

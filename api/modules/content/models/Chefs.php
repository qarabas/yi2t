<?php

namespace app\modules\content\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "chefs".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Orders[] $orders
 */
class Chefs extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chefs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['chef_id' => 'id']);
    }
}

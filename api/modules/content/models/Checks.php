<?php

namespace app\modules\content\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 *
 * @property Orders[] $orders
 */
class Checks extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['check_id' => 'id']);
    }
}

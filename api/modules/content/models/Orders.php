<?php

namespace app\modules\content\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $dish_id
 * @property int|null $check_id
 * @property int|null $created_at
 *
 * @property Checks $check
 * @property Dishes $dish
 */
class Orders extends ActiveRecord
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
            [['dish_id', 'check_id'], 'integer'],
            [['dish_id', 'check_id'], 'required', 'message'=>'Please enter a value for {attribute}.'],
            [['check_id'], 'exist', 'skipOnError' => true, 'targetClass' => Checks::class, 'targetAttribute' => ['check_id' => 'id'], 'message'=> 'Check doesn\'t exists'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::class, 'targetAttribute' => ['dish_id' => 'id'], 'message'=> 'Dish doesn\'t exists'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'check_id' => 'Check ID',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert)
    {
        $this->created_at = date('Ymd');
        return parent::beforeSave($insert);
    }


    /**
     * Gets query for [[Check]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheck()
    {
        return $this->hasOne(Checks::class, ['id' => 'check_id']);
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

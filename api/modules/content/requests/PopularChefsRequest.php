<?php

namespace api\modules\content\requests;

use Yii;
use yii\db\ActiveRecord;

class PopularChefsRequest extends ActiveRecord
{
    public $date_from;
    public $date_to;

    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'date', 'format' => 'php:Ymd'],
            [['date_from', 'date_to'], 'required', 'message'=>'Please enter a value for {attribute}.'],
        ];
    }

    public function getList()
    {
        $dateFrom = $this->date_from;
        $dateTo = $this->date_to;
        $sql = "select count(orders.id) as order_count, chefs.name 
                from dishes 
                left join orders on dishes.id = orders.dish_id 
                left join chefs on dishes.chef_id = chefs.id 
                where orders.created_at >= $dateFrom
                and orders.created_at <= $dateTo
                group by chefs.name  
                order by order_count DESC;";

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        return $command->queryAll();
    }
}
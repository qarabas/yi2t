<?php

namespace api\modules\content\controllers;

use app\modules\content\models\Chefs;
use app\modules\content\models\Orders;
use Yii;
use yii\rest\ActiveController;
use yii\web\HttpException;

class ChefsController extends ActiveController
{
    public $modelClass = 'app\modules\content\models\Chefs';
    public function actions(){
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        return $actions;
    }

    protected function verbs(){
        return [
            'popular'=>['GET'],
        ];
    }

    /**
     * @throws HttpException
     */
    public function actionPopular(): array
    {
        try {
            $sql = "select count(orders.id) as order_count, chefs.name from chefs left join orders on chefs.id = orders.chef_id group by chefs.name  order by order_count DESC ;";

            $connection = Yii::$app->getDb();
            $command = $connection->createCommand($sql);
            return $command->queryAll();
        } catch (\Exception $ex){
            throw new HttpException(404,'error');
        }
    }
}
<?php

namespace api\modules\content\controllers;

use app\modules\content\models\Chefs;
use app\modules\content\models\Dishes;
use Yii;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use function PHPUnit\Framework\throwException;

class OrdersController extends ActiveController
{
    public $modelClass = 'app\modules\content\models\Orders';

    public function actions(){
        $actions = parent::actions();
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['index']);
        unset($actions['view']);
        return $actions;
    }
    protected function verbs(){
        return [
            'add' =>['POST'],
        ];
    }

    /**
     * @throws \yii\web\HttpException
     * @throws NotFoundHttpException
     */
    public function actionAdd(): array
    {
        $form = Yii::$app->request->post();
        if (!empty($form['dish_id']) && !empty($form['chef_id']) && !empty($form['order_number'])){
            if ($this->findChef($form['chef_id']) && $this->findDish($form['dish_id'])){
                $model = new $this->modelClass;
                $model->dish_id = $form['dish_id'];
                $model->chef_id = $form['chef_id'];
                $model->order_number = $form['order_number'];
                $model->created_at = date('Ymd');
                if ($model->save()){
                    return [
                        "name" => "OK",
                        "message" => "saved",
                        "code" => 0,
                        "status" => 200,
                    ];
                }else{
                    throw new HttpException(404, 'Doesn\'t saved');
                }
            }else{
                throw new HttpException(404, 'Dish or chef doesn\'t exists');
            }
        }else{
            throw new HttpException(404, 'Must have fields: dish_id, chef_id, order_number');
        }
    }

    protected function findChef($chef_id)
    {
        return Chefs::find()->where(['id' => $chef_id])->one();
    }
    protected function findDish($dish_id)
    {
        return Dishes::find()->where(['id' => $dish_id])->one();
    }
}
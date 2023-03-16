<?php

namespace api\modules\content\controllers;

use app\modules\content\models\Dishes;
use yii\rest\ActiveController;
use yii\web\HttpException;

class DishesController extends ActiveController
{
    public $modelClass = 'app\modules\content\models\Dishes';
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
            'index'=>['GET'],
        ];
    }
}
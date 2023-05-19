<?php

namespace api\modules\content\controllers;

use api\modules\content\handlers\ResponseHandler;
use app\modules\content\models\Dishes;
use yii\rest\Controller;

class DishesController extends Controller
{
    public $modelClass = 'app\modules\content\models\Dishes';

    protected function verbs(){
        return [
            'menu'=>['GET'],
        ];
    }

    public function actionMenu()
    {
        return ResponseHandler::createResponse(Dishes::getReadyDishes());
    }
}
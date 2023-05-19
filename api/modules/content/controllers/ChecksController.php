<?php

namespace api\modules\content\controllers;

use api\modules\content\handlers\ResponseHandler;
use app\modules\content\models\Checks;
use yii\rest\Controller;
use yii\web\HttpException;

class ChecksController extends Controller
{
    protected function verbs(){
        return [
            'create'=>['POST'],
        ];
    }

    /**
     * @throws HttpException
     */
    public function actionCreate()
    {
        $model = new Checks();
        if ($model->save()){
            return ResponseHandler::createResponse($model->toArray());
        }else{
            throw new HttpException(404,'error');
        }
    }
}
<?php

namespace api\modules\content\controllers;

use api\modules\content\handlers\MainActions;
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
        $abstractModel = new MainActions($model);
        $abstractModel = $abstractModel->validateAndSave();
        return ResponseHandler::createResponse(!empty($abstractModel) ? $abstractModel : ['error'], !empty($abstractModel) ? 200 : 404);
    }
}
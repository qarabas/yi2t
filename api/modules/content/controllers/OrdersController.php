<?php

namespace api\modules\content\controllers;

use api\modules\content\handlers\MainActions;
use api\modules\content\handlers\ResponseHandler;
use app\modules\content\models\Orders;
use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class OrdersController extends Controller
{
    public $modelClass = 'app\modules\content\models\Orders';

    protected function verbs(){
        return [
            'create' =>['POST'],
        ];
    }

    /**
     * @throws \yii\web\HttpException
     * @throws NotFoundHttpException
     */
    public function actionCreate(): array
    {
        $form = Yii::$app->request->post();
        $model = new Orders();
        $model->load($form, '');
        $abstractModel = new MainActions($model);
        $abstractModel = $abstractModel->validateAndSave();
        return ResponseHandler::createResponse(!empty($abstractModel) ? $abstractModel : ['error'], !empty($abstractModel) ? 200 : 404);
    }
}
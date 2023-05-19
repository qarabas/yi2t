<?php

namespace api\modules\content\controllers;

use api\modules\content\handlers\ResponseHandler;
use api\modules\content\requests\PopularChefsRequest;
use Yii;
use yii\rest\Controller;
use yii\web\HttpException;

class ChefsController extends Controller
{
    public $modelClass = 'app\modules\content\models\Chefs';

    protected function verbs(){
        return [
            'popular'=>['POST'],
        ];
    }

    /**
     * @throws HttpException
     */
    public function actionPopular(): array
    {
        $form = Yii::$app->request->post();
        $model = new PopularChefsRequest();
        $model->load($form, '');
        if ($model->validate()) {
            $data = $model->getList();
        }else{
            $data = $model->errors;
        }
        return ResponseHandler::createResponse($data);
    }
}
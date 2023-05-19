<?php

namespace api\modules\content;

use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;

/**
 * content module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\content\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
//        Yii::$app->user->identityClass = 'api\modules\v1\models\ApiUserIdentity';
//        Yii::$app->user->enableSession = false;
//        Yii::$app->user->loginUrl = null;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $behaviors['rateLimiter'] = [
            'class' => RateLimiter::class,
        ];

        return $behaviors;
    }

}
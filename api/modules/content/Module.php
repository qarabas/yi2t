<?php

namespace api\modules\content;

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

}
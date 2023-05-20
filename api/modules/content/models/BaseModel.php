<?php

namespace app\modules\content\models;

use api\modules\content\interfaces\MainActionsInterface;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord implements MainActionsInterface
{
    public function validateAndSave(): array
    {
        return $this->validate() && $this->save() ? $this->toArray() : $this->errors;
    }
}
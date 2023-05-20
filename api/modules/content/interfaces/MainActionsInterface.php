<?php

namespace api\modules\content\interfaces;

interface MainActionsInterface
{
    public function validateAndSave() : array;
}
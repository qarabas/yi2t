<?php


namespace api\modules\content\handlers;


use api\modules\content\interfaces\MainActionsInterface;

class MainActions
{
    private MainActionsInterface $mainActionsInterface;

    public function __construct(MainActionsInterface $mainActionsInterface)
    {
        return $this->mainActionsInterface = $mainActionsInterface;
    }

    public function validateAndSave() : array
    {
        return $this->mainActionsInterface->validateAndSave();
    }
}
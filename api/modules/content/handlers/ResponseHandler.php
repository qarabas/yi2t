<?php

namespace api\modules\content\handlers;

class ResponseHandler
{
    static function createResponse(array $data = [], int $status = 200)
    {
        return [
            "status" => $status,
            "data" => $data
        ];
    }
}
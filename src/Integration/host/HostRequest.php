<?php

namespace src\Integration\host;

use src\Integration\IRequest;

class HostRequest implements IRequest
{
    public function send($connection, $params)
    {
        return $connection->someApiMethod($this->prepareInputData($params));
    }

    public function prepareInputData($inputData)
    {
        return $inputData;
    }
}
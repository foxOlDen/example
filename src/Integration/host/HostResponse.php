<?php

namespace src\Integration\host;

use src\Integration\IResponse;

class HostResponse implements IResponse
{
    public function getFormattedData($data)
    {
        return $data;
    }
}
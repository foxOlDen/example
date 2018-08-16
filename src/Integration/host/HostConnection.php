<?php

namespace src\Integration\host;

use src\Integration\IConnection;

class HostConnection implements IConnection
{
    public function connect($params)
    {
        // returns a connect for external service by $params
        return new SomeConnection($params['host'], $params['username'], $params['password']);
    }
}
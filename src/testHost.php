<?php

$connectionModel = new \src\Integration\host\HostConnection();
$requestModel = new \src\Integration\host\HostRequest();
$responseModel = new \src\Integration\host\HostResponse();
$loggerModel = new Psr\Log\Logger();

$result = new \src\Integration\host\DecoratorHostManager($connectionModel, $requestModel, $responseModel, $loggerModel);
$result->initCache(new Psr\Cache\CacheItemPool());

$result->getResponseFromServer([
    'host' => 'http://someHost.com',
    'username' => 'user',
    'password' => '123',
], [
    'api_key' => 'vghcgcfcfcgfjf55%@$%4r5r'
]);
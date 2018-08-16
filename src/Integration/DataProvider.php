<?php

namespace src\Integration;

use Psr\Log\ILogger;

class DataProvider
{
    protected $_connection;
    protected $_request;
    protected $_response;
    protected $_logger;

    public function __construct(IConnection $connection, IRequest $request, IResponse $response, ILogger $logger)
    {
        $this->_request = $request;
        $this->_response = $response;
        $this->_connection = $connection;
        $this->_logger = $logger;
    }

    public function getData($settingsServer, $params)
    {
        $result = $this->_request->send($this->_connection->connect($settingsServer), $params);
        return $this->_response->getFormattedData($result);
    }
}
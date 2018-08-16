<?php

namespace src\Integration;

interface IRequest
{
    public function send($connection, $params);
    public function prepareInputData($inputData);
}
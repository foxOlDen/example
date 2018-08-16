<?php

namespace src\Integration;

interface IConnection
{
    public function connect($params);
}
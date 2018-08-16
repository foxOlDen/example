<?php

namespace src\Integration\host;

use DateTime;
use Exception;
use src\Integration\DataProvider;
use Psr\Cache\ICacheItemPool;

class DecoratorHostManager extends DataProvider
{
    private $_cache;

    public function initCache(ICacheItemPool $cache)
    {
        $this->_cache = $cache;
    }

    public function getResponseFromServer($settingsServer, $inputParams)
    {
        $result = null;
        try {
            $cacheKey = json_encode($inputParams);
            $cacheItem = $this->_cache->getItem($cacheKey);
            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }
            $result = parent::getData($settingsServer, $inputParams);
            $cacheItem->set($cacheKey, $result)->expiresAt((new DateTime())->modify('+1 day'));
        } catch (Exception $ex) {
            $this->_logger->critical('Error: ' . $ex->getMessage());
        }
        return $result;
    }
}
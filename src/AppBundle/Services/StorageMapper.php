<?php
use AppBundle\Services\CacheService;

/**
 * Created by PhpStorm.
 * User: stefan.balea
 * Date: 26.05.2015
 * Time: 11:42
 */

class StorageMapper
{
    /** @var  CacheService */
    protected $cacheService;

    /**
     * @return CacheService
     */
    public function getCacheService()
    {
        return $this->cacheService;
    }

    /**
     * @param CacheService $cacheService
     */
    public function setCacheService($cacheService)
    {
        $this->cacheService = $cacheService;
    }


}
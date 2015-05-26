<?php
namespace AppBundle\Services;

use Snc\RedisBundle\Doctrine\Cache\RedisCache;

/**
 * Created by PhpStorm.
 * User: stefan.balea
 * Date: 26.05.2015
 * Time: 11:49
 */

class CacheService extends RedisCache
{
    const LOCALHOST = '127.0.0.1';

    /** @var \Redis  */
    protected $_redis;

    public function initiateRedis()
    {
        $redis = $this->getRedis();
        if ($redis == null) {
            $redis = new \Redis;
            $redis->setOption(\Redis::OPT_SERIALIZER, \Redis::SERIALIZER_PHP);
            $redis->connect(self::LOCALHOST);
            $this->setRedis($redis);
        }
    }

    /**
     * @param $id
     *
     * @return bool|string
     */
    public function redisGetData($id)
    {
        return $this->_redis->get($id);
    }
    /**
     * @param      $id
     * @param      $data
     * @param bool $lifetime
     *
     * @return bool
     */
    public function redisSave($id, $data, $lifetime = false)
    {
        return $this->doSave($id, $data, $lifetime);
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function redisDelete($id)
    {
        return $this->doDelete($id);
    }

    /**
     * @return bool
     */
    public function redisFlush()
    {
        return $this->doFlush();
    }

    /**
     * @return array|null
     */
    public function getRedisStats()
    {
        return $this->doGetStats();
    }
}

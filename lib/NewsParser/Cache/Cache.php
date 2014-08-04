<?php

namespace Sprain\NewsParser\Cache;

use Doctrine\Common\Cache\FilesystemCache;

class Cache
{
    protected $cacheEnabled = true;
    protected $cacheLifetime = 3600;
    protected $cacheDir;
    protected $cache;

    public function save($id, $data)
    {
        if ($this->getCache()) {

            return $this->getCache()->save($id, $data, $this->cacheLifetime);
        }

        return false;
    }

    public function fetch($id)
    {
        if ($this->getCache()) {

            return $this->getCache()->fetch($id);
        }

        return false;
    }

    public function clear()
    {
        if ($this->getCache()) {

            return $this->getCache()->deleteAll();
        }

        return false;
    }

    public function disable()
    {
        $this->cacheEnabled = false;

        return $this;
    }

    public function enable()
    {
        $this->cacheEnabled = true;

        return $this;
    }

    public function setCacheLifetime($lifetimeInSeconds)
    {
        $this->cacheLifetime = $lifetimeInSeconds;

        return $this;
    }

    public function getCacheLifetime()
    {
        return $this->cacheLifetime;
    }

    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;

        return $this;
    }

    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    public function getCache()
    {
        if (!$this->cacheEnabled) {

            return false;
        }

        if (null !== $this->cache) {

            return $this->cache;
        }

        if (null === $this->cacheDir) {

            return false;
        }

        return new FilesystemCache($this->cacheDir);
    }
}
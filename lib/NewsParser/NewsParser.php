<?php

namespace Sprain\NewsParser;

use Sprain\NewsParser\Cache\Cache;

class NewsParser
{
    protected $cache;

    public function getPlatform($platformKey)
    {
        $platformNameParts = explode('-', $platformKey);
        $platformClassName = __NAMESPACE__ . '\\Parser\\Platforms\\'. strtoupper($platformNameParts[0]) . '\\'. ucfirst($platformNameParts[1]) . 'Parser';

        $platform = new $platformClassName();
        $platform->setCache($this->getCache());

        return $platform;
    }

    public function setCacheDir($cacheDir)
    {
        $this->getCache()->setCacheDir($cacheDir);

        return $this;
    }

    public function getCache()
    {
        if (null === $this->cache) {
            $this->cache = new Cache();
        }

        return $this->cache;
    }
}
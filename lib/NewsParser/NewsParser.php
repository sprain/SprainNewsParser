<?php

namespace Sprain\NewsParser;

use Sprain\NewsParser\Cache\Cache;

class NewsParser
{
    protected $cache;
    protected $rootNamespaces = array();

    public function __construct()
    {
        $this->rootNamespaces = array(
            __NAMESPACE__ . '\\Parser\\Platforms\\'
        );
    }

    public function getPlatform($platformKey)
    {
        $platformNameParts = explode('-', $platformKey);

        $classFound = false;
        foreach($this->rootNamespaces as $rootNamespace){
            $platformClassName = $rootNamespace . strtoupper($platformNameParts[0]) . '\\'. ucfirst($platformNameParts[1]) . 'Parser';
            if (class_exists($platformClassName)) {
                $classFound = true;
                break;
            }
        }

        if (!$classFound) {

        }

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

    public function addRootNamespace($namespace)
    {
        $this->rootNamespaces[] = $namespace;

        return $this;
    }
}


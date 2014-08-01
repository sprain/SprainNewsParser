<?php

namespace Sprain\NewsParser\Parser;

use Sprain\NewsParser\Cache\Cache;

class Parser
{
    protected $cache;
    protected $platform;
    protected $platformClass;

    public function getMostReadArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->getPlatform()->doGetMostReadArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function getRecommendedArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->getPlatform()->doGetRecommendedArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function getMostCommentedArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->getPlatform()->doGetMostCommentedArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function setPlatform($platformKey)
    {
        $platformNameParts = explode('-', $platformKey);
        $this->platformClass = __NAMESPACE__ . '\\Platforms\\'. strtoupper($platformNameParts[0]) . '\\'. ucfirst($platformNameParts[1]) . 'Parser';

        $this->platform = null;

        return $this;
    }

    public function getPlatform()
    {
        if (null === $this->platform) {
            $this->platform = new $this->platformClass();
        }

        return $this->platform;
    }

    public function getCache()
    {
        if (null === $this->cache) {
            $this->cache = new Cache();
        }

        return $this->cache;
    }
}
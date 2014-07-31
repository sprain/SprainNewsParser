<?php

namespace Sprain\NewsParser\Parser;

use Sprain\NewsParser\Cache\Cache;

class Parser
{
    protected $cache;

    public function getMostReadArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->doGetMostReadArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function getRecommendedArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->fetchFromCache($cacheId)) {
            $articles = $this->doGetRecommendedArticles($limit);
            $this->saveToCache($cacheId, $articles);
        }

        return $articles;
    }

    public function getMostCommentedArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->fetchFromCache($cacheId)) {
            $articles = $this->doGetMostCommentedArticles($limit);
            $this->saveToCache($cacheId, $articles);
        }

        return $articles;
    }

    public function getCache()
    {
        if (null === $this->cache) {
            $this->cache = new Cache();
        }

        return $this->cache;
    }
}
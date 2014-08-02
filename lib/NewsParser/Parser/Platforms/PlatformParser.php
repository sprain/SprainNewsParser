<?php

namespace Sprain\NewsParser\Parser\Platforms;

use Sprain\NewsParser\Cache\Cache;

abstract class PlatformParser
{
    protected $cache;
    protected $rootUrl;

    abstract function doGetMostReadArticles($limit = null);

    abstract function doGetRecommendedArticles($limit = null);

    abstract function doGetMostCommentedArticles($limit = null);

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

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->doGetRecommendedArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function getMostCommentedArticles($limit = null)
    {
        $cacheId = get_called_class().':'.__METHOD__;

        if (!$articles = $this->getCache()->fetch($cacheId)) {
            $articles = $this->doGetMostCommentedArticles($limit);
            $this->getCache()->save($cacheId, $articles);
        }

        return $articles;
    }

    public function getIconUrl()
    {
        return 'http://www.google.com/s2/favicons?domain=' . $this->getRootUrl();
    }

    public function getRootUrl()
    {
        return $this->rootUrl;
    }

    public function setCache(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function getCache()
    {
        return $this->cache;
    }
}
<?php

namespace Sprain\NewsParser\Test\TestData\Platforms\FOO;

use Sprain\NewsParser\Parser\Platforms\PlatformParser;
use Sunra\PhpSimple\HtmlDomParser;

class BarParser extends PlatformParser
{
    protected $rootUrl = 'http://www.bar.com';

    /**
     * @inherit
     */
    public  function doGetMostReadArticles($limit = null)
    {
        return $limit . ' most read';
    }

    /**
     * @inherit
     */
    public function doGetRecommendedArticles($limit = null)
    {
        return $limit . ' recommended';
    }

    /**
     * @inherit
     */
    public function doGetMostCommentedArticles($limit = null)
    {
        return $limit . ' most commented';
    }
}
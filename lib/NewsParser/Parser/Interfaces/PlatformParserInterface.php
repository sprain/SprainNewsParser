<?php

namespace Sprain\NewsParser\Parser\Interfaces;

interface PlatformParserInterface
{
    function doGetMostReadArticles($limit = null);

    function doGetRecommendedArticles($limit = null);

    function doGetMostCommentedArticles($limit = null);
}
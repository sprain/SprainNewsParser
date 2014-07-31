<?php

namespace Sprain\NewsParser\Parser\Interfaces;

interface PlatformParserInterface
{
    function getMostReadArticles($limit = null);

    function getRecommendedArticles($limit = null);

    function getMostCommentedArticles($limit = null);
}
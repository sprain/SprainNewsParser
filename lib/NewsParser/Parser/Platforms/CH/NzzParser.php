<?php

namespace Sprain\NewsParser\Parser\Platforms\CH;

use Sprain\NewsParser\Parser\Interfaces\PlatformParserInterface;
use Sprain\NewsParser\Parser\Parser;
use Sunra\PhpSimple\HtmlDomParser;

class NzzParser extends Parser implements PlatformParserInterface
{
    protected $rootUrl = 'http://www.nzz.ch';

    /**
     * @inherit
     */
    protected  function doGetMostReadArticles($limit = null)
    {
        return $this->getArticles('#tab-Gelesen', $limit);
    }

    /**
     * @inherit
     */
    protected function doGetRecommendedArticles($limit = null)
    {
        return $this->getArticles('#tab-Empfohlen', $limit);
    }

    /**
     * @inherit
     */
    protected function doGetMostCommentedArticles($limit = null)
    {
        return $this->getArticles('#tab-Kommentiert', $limit);
    }

    /**
     * Load articles
     *
     * @param string $element
     * @param int $limit
     * @return array
     */
    protected function getArticles($element, $limit)
    {
        $articles = array();

        $dom = HtmlDomParser::file_get_html( $this->rootUrl );
        $listElements = $dom->find($element.' li');

        $i=0;
        foreach ($listElements as $listElement) {
            $link = $listElement->find('a', 0);
            $articles[] = array(
                'url' => $this->rootUrl . $link->href,
                'text' => $link->plaintext
            );

            $i++;
            if ($i == $limit) {
                break;
            }
        }

        return $articles;
    }
}
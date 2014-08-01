<?php

namespace Sprain\NewsParser\Parser\Platforms\CH;

use Sprain\NewsParser\Parser\Exceptions\NotImplementedException;
use Sprain\NewsParser\Parser\Interfaces\PlatformParserInterface;
use Sprain\NewsParser\Parser\Parser;
use Sunra\PhpSimple\HtmlDomParser;

class TagesanzeigerParser extends PlatformParser implements PlatformParserInterface
{
    protected $rootUrl = 'http://www.tagesanzeiger.ch';

    /**
     * @inherit
     */
    public function doGetMostReadArticles($limit = null)
    {
        return $this->getArticles('#mostPopular', $limit);
    }

    /**
     * @inherit
     */
    public function doGetRecommendedArticles($limit = null)
    {
        throw new NotImplementedException(__METHOD__);
    }

    /**
     * @inherit
     */
    public function doGetMostCommentedArticles($limit = null)
    {
        throw new NotImplementedException(__METHOD__);
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
        $listElements = $dom->find($element.' table tbody tr');

        $i=0;
        foreach ($listElements as $listElement) {
            $tableCell = $listElement->find('td', 1);
            $link = $tableCell->find('a', 0);
            $articles[] = array(
                'url' => $this->rootUrl . $link->href,
                'title' => $link->plaintext
            );

            $i++;
            if ($i == $limit) {
                break;
            }
        }

        return $articles;
    }
}
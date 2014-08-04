<?php

namespace Sprain\NewsParser\Test\NewsParser\Parser\Platforms;

require_once(__DIR__ . '/../../../TestData/Platforms/FOO/BarParser.php');
use Sprain\NewsParser\Cache\Cache;
use Sprain\NewsParser\Test\TestData\Platforms\FOO\BarParser;

class PlatformParserTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->parser = new BarParser();
    }

    public function testGetMostReadArticles()
    {
        $this->assertSame('5 most read', $this->parser->getMostReadArticles(5));
    }

    public function testGetRecommendedArticles()
    {
        $this->assertSame('5 recommended', $this->parser->getRecommendedArticles(5));
    }

    public function testGetMostCommentedArticles()
    {
        $this->assertSame('5 most commented', $this->parser->getMostCommentedArticles(5));
    }

    public function testSetGetCache()
    {
        $this->parser->setCache(new Cache());
        $this->assertTrue($this->parser->getCache() instanceof Cache);
    }

    public function testGetRootUrl()
    {
        $this->assertSame('http://www.bar.com', $this->parser->getRootUrl());
    }

    public function testGetIconUrl()
    {
        $this->assertSame('http://www.google.com/s2/favicons?domain=http://www.bar.com', $this->parser->getIconUrl());
    }
}
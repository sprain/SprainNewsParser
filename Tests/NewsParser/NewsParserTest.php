<?php

namespace Sprain\NewsParser\Test\NewsParser;

use Sprain\NewsParser\Cache\Cache;
use Sprain\NewsParser\NewsParser;
use Sprain\NewsParser\Parser\Platforms\CH\NzzParser;

class NewsParserTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->newsParser = new NewsParser();
    }

    public function testGetPlatform()
    {
        $this->assertTrue($this->newsParser->getPlatform('ch-nzz') instanceof NzzParser);
    }

    public function testGetCache()
    {
        $this->assertTrue($this->newsParser->getCache() instanceof Cache);
    }

    public function testSetCacheDir()
    {
        $this->newsParser->setCacheDir('foo');
        $this->assertSame('foo', $this->newsParser->getCache()->getCacheDir());
    }
}
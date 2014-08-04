<?php

namespace Sprain\NewsParser\Test\NewsParser\Cache;

use Doctrine\Common\Cache\FilesystemCache;
use Sprain\NewsParser\Cache\Cache;

class CacheTest extends \PHPUnit_Framework_TestCase
{
    protected $cacheDir = '../../testcache';

    public function setUp()
    {
        $this->cache = new Cache();
        $this->cache->setCacheDir(__DIR__ . DIRECTORY_SEPARATOR . $this->cacheDir);
    }

    public function tearDown()
    {
        $this->rrmdir(__DIR__ . DIRECTORY_SEPARATOR . $this->cacheDir);
    }

    public function testGetCache()
    {
        $this->assertTrue($this->cache->getCache() instanceof FilesystemCache);
    }

    public function testGetCacheFailsWithoutCacheDir()
    {
        $this->cache->setCacheDir(null);
        $this->assertFalse($this->cache->getCache() instanceof FilesystemCache);
    }

    public function testDisableCache()
    {
        $this->cache->disable();
        $this->assertFalse($this->cache->getCache() instanceof FilesystemCache);
    }

    public function testSaveAndFetch()
    {
        $this->cache->save('foo', 'bar');
        $this->assertSame('bar', $this->cache->fetch('foo'));
    }

    public function testClearCache()
    {
        $this->cache->save('foo', 'bar');
        $this->cache->clear();
        $this->assertFalse($this->cache->fetch('foo'));
    }

    public function testSetLifetime()
    {
        $this->cache->setCacheLifetime(1);
        $this->assertSame(1, $this->cache->getCacheLifetime());
        $this->cache->save('foo', 'bar');
        $this->assertSame('bar', $this->cache->fetch('foo'));
        sleep(2);
        $this->assertFalse($this->cache->fetch('foo'));
    }

    protected function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
}
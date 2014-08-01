<?php

namespace Sprain\NewsParser\Parser\Platforms;

abstract class PlatformParser
{
    public function getRootUrl()
    {
        return $this->rootUrl;
    }
}
<?php

namespace Sprain\NewsParser\Parser\Exceptions;

class PlatformNotFoundException extends \Exception
{
    public function __construct($plattformKey) {

        return parent::__construct("No parser class for platform '$plattformKey' could be found.");
    }
}
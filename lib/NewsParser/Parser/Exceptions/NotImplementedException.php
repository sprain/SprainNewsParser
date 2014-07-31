<?php

namespace Sprain\NewsParser\Parser\Exceptions;

class NotImplementedException extends \Exception
{
    public function __construct($methodName) {

        return parent::__construct("$methodName is not implemented");
    }
}
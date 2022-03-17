<?php

namespace framework\exceptions;

class URIException extends \Exception
{
    public static function invalid()
    {
        return new static('Invalid URI');
    }
}
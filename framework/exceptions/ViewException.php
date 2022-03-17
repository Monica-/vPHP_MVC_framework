<?php

namespace framework\exceptions;

class ViewException extends \Exception
{
    public static function notFound($view)
    {
        return new static("View $view not found");
    }
}
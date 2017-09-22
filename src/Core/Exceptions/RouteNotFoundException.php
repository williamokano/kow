<?php
namespace Katapoka\Kow\Core\Exceptions;

use Throwable;

class RouteNotFoundException extends RouteException
{
    public function __construct($path, $code = 0, Throwable $previous = null) {
        parent::__construct($path, "No route found to the following path $path", $code, $previous);
    }
}

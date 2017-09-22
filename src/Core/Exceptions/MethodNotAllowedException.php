<?php

namespace Katapoka\Kow\Core\Exceptions;

use Throwable;

class MethodNotAllowedException extends RouteException
{
    /** @var string */
    private $method;

    public function __construct($method, $path, $code = 0, Throwable $previous = null)
    {
        parent::__construct($path, "The method $method is not allowed to the following path $path", $code, $previous);
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}

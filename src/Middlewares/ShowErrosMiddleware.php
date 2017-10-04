<?php

namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;

class ShowErrosMiddleware extends AbstractMiddleware
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        return $delegate->process($request);
    }
}

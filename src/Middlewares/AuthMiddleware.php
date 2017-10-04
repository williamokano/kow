<?php

namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware extends AbstractMiddleware
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return $delegate->process($request)->withHeader('X-Powered-By', 'kow 1.0-alpha');
    }
}

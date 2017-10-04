<?php

namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;

class NotFoundMiddleware extends AbstractMiddleware
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return $this->response('', 404);
    }
}

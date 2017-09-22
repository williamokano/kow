<?php
namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\DelegateInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ShowErrosMiddleware extends AbstractMiddleware
{

    /**
     * Process an incoming client or server request and return a response,
     * optionally delegating to the next middleware component to create the response.
     *
     * @param RequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(RequestInterface $request, DelegateInterface $delegate) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        return $delegate->process($request);
    }
}

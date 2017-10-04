<?php

namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\ServerMiddlewareInterface;
use Katapoka\Kow\Core\Application;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractMiddleware implements ServerMiddlewareInterface
{
    /**
     * @Inject
     * @var Application
     */
    protected $app;

    /**
     * @return DiactorosFactory
     */
    protected function getPsr7Factory()
    {
        static $psr7factory = null;
        if (null === $psr7factory) {
            $psr7factory = new DiactorosFactory();
        }

        return $psr7factory;
    }

    /**
     * @param string $content
     * @param int $status
     * @param $headers
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function json($content = '', $status = 200, $headers = [])
    {
        return $this->getPsr7Factory()->createResponse(new JsonResponse($content, $status, $headers));
    }

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function response($content = '', $status = 200, $headers = [])
    {
        return $this->getPsr7Factory()->createResponse(new Response($content, $status, $headers));
    }
}

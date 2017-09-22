<?php
namespace Katapoka\Kow\Middlewares;

use Interop\Http\Middleware\DelegateInterface;
use Katapoka\Kow\Core\Exceptions\MethodNotAllowedException;
use Katapoka\Kow\Core\Exceptions\RouteException;
use Katapoka\Kow\Core\Exceptions\RouteNotFoundException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RouterMiddleware extends AbstractMiddleware
{
    /**
     * @Inject
     * @var \Katapoka\Kow\Core\Router
     */
    private $router;

    /**
     * Process an incoming client or server request and return a response,
     * optionally delegating to the next middleware component to create the response.
     *
     * @param RequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(RequestInterface $request, DelegateInterface $delegate)
    {
        $this->registerRoutes();

        try {
            [$handler, $params] = $this->router->dispatch($request->getMethod(), $request->getUri()->getPath());

            $return = $this->app->getContainer()->call($handler, $params);
            $response = $this->asResponse($return);
        } catch (RouteNotFoundException $nfex) {
            $response = $delegate->process($request)->withStatus(404);
        } catch (MethodNotAllowedException $mnaex) {
            $response = $delegate->process($request)->withStatus(405);
        } catch (RouteException $rex) {
            $response = $delegate->process($request)->withStatus(500);
        }

        return $response;
    }

    private function asResponse($any)
    {
        if (!$any instanceof Response) {
            return $this->json($any);
        }

        return $any;
    }

    private function registerRoutes() {
        $router = $this->router;
        include SRC_PATH . DIRECTORY_SEPARATOR . 'Kernel' . DIRECTORY_SEPARATOR . 'routes.php';
    }
}

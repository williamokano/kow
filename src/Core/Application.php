<?php

namespace Katapoka\Kow\Core;

use DI\ContainerBuilder;
use Exception;
use Katapoka\Kow\App\Kernel\ExceptionHandler;
use mindplay\middleman\ContainerResolver;
use mindplay\middleman\Dispatcher;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\HttpFoundation\Request;

class Application
{
    /** @var \DI\Container */
    private $container;
    private $config;

    public function __construct()
    {
        $builder = new ContainerBuilder();
        $this->config = new Config();

        $builder->useAnnotations(true);
        $builder->addDefinitions($this->config->get('di'));
        $this->container = $builder->build();
    }

    /**
     * @return DiactorosFactory
     */
    public static function getPsr7Factory()
    {
        static $psr7factory = null;
        if (null === $psr7factory) {
            $psr7factory = new DiactorosFactory();
        }

        return $psr7factory;
    }

    public static function request()
    {
        $request = $symfonyRequest = Request::createFromGlobals();

        return self::getPsr7Factory()->createRequest($request);
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function run()
    {
        try {
            $dispatcher = new Dispatcher($this->config->get('middlewares'), new ContainerResolver($this->container));

            $psr7Response = $dispatcher->dispatch(self::request());
            $httpFoundationFactory = new HttpFoundationFactory();
            $symfonyResponse = $httpFoundationFactory->createResponse($psr7Response);
        } catch (Exception $e) {
            $symfonyResponse = ExceptionHandler::handler($e);
        }

        $symfonyResponse->send();
    }
}

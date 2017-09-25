<?php

use function DI\factory;
use function DI\get;
use DI\Scope;
use Katapoka\Kow\Core\Application;

return [
    \Psr\Http\Message\RequestInterface::class => Application::request(),
    \Symfony\Component\HttpFoundation\Request::class => \Symfony\Component\HttpFoundation\Request::createFromGlobals(),
    \Katapoka\Kow\App\Services\Contracts\UserService::class => get(\Katapoka\Kow\App\Services\UserServiceImpl::class),
    \Katapoka\Kow\App\Repositories\Contracts\UserRepository::class => get(\Katapoka\Kow\App\Repositories\UserRepositoryImpl::class),
    \Doctrine\ORM\EntityManager::class => factory(function () {
        $paths = [APP_PATH . DIRECTORY_SEPARATOR . 'Models'];
        $idDevMode = false;
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $idDevMode);
        return \Doctrine\ORM\EntityManager::create($this->get('db'), $config);
    })->scope(Scope::SINGLETON),
];

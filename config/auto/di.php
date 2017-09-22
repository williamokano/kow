<?php

use function DI\get;
use Katapoka\Kow\Core\Application;

return [
    \Psr\Http\Message\RequestInterface::class => Application::request(),
    \Symfony\Component\HttpFoundation\Request::class => function () { return \Symfony\Component\HttpFoundation\Request::createFromGlobals(); },
    \Katapoka\Kow\App\Services\Contracts\UserService::class => get(\Katapoka\Kow\App\Services\UserServiceImpl::class),
    \Katapoka\Kow\App\Repositories\Contracts\UserRepository::class => get(\Katapoka\Kow\App\Repositories\UserRepositoryImpl::class),
];

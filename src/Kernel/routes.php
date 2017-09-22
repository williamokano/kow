<?php

use Katapoka\Kow\App\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/users', [HomeController::class, 'index']);
$router->get('/users/{id:\d+}', [HomeController::class, 'getById']);
$router->get('/teste', function () {
    return ['hello' => 'world', 'to' => 'Okano'];
});

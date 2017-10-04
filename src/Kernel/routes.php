<?php

use Katapoka\Kow\App\Controllers\HomeController;

$this->router->get('/', [HomeController::class, 'index']);
$this->router->get('/users', [HomeController::class, 'index']);
$this->router->get('/users/{id:\d+}', [HomeController::class, 'getById']);
$this->router->get('/users/{field}/{value}', [HomeController::class, 'findBy']);
$this->router->get('/teste', function () {
    return ['hello' => 'world', 'to' => 'Okano'];
});

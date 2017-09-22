<?php

$router->get('/', [\Katapoka\Kow\App\Controllers\HomeController::class, 'index']);
$router->get('/teste', function () {
    return ['hello' => 'world', 'to' => 'Okano'];
});

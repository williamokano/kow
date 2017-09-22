<?php

// --------- Middleware Stack ---------
// Roda exatamente na ordem definida
return [
    \Katapoka\Kow\Middlewares\ShowErrosMiddleware::class,

    // --------- FW Middlewares ---------
    \Katapoka\Kow\Middlewares\AuthMiddleware::class,
    \Katapoka\Kow\Middlewares\RouterMiddleware::class,

    // --------- Core Middlewares ---------
    \Katapoka\Kow\Middlewares\NotFoundMiddleware::class
];

<?php
namespace Katapoka\Kow\App\Controllers;

use Katapoka\Kow\App\Services\Contracts\UserService;
use Symfony\Component\HttpFoundation\Request;

class HomeController {
    public function index(Request $request, UserService $service)
    {
        return [$service->getAll(), $request->query->all()];
    }
}

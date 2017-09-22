<?php
namespace Katapoka\Kow\App\Controllers;

use Katapoka\Kow\App\Services\Contracts\UserService;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    /**
     * @Inject
     * @var UserService
     */
    private $userService;
    public function index()
    {
        return $this->userService->getAll();
    }

    public function getById($id)
    {
        return $this->userService->getById($id);
    }
}

<?php
namespace Katapoka\Kow\App\Controllers;

use Katapoka\Kow\App\Services\Contracts\UserService;

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

    public function findBy($field, $value)
    {
        return $this->userService->getBy($field, $value);
    }
}

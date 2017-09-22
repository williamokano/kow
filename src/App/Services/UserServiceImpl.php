<?php
namespace Katapoka\Kow\App\Services;

use Katapoka\Kow\App\Repositories\Contracts\UserRepository;
use Katapoka\Kow\App\Services\Contracts\UserService;

class UserServiceImpl implements UserService
{
    /**
     * @Inject
     * @var UserRepository
     */
    private $repository;

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id) {
        return $this->repository->getById($id);
    }
}

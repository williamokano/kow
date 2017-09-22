<?php
namespace Katapoka\Kow\App\Repositories;

use Doctrine\ORM\EntityManager;
use Katapoka\Kow\App\Models\User;
use Katapoka\Kow\App\Repositories\Contracts\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    /**
     * @Inject
     * @var EntityManager
     */
    private $entityManager;
    public function getAll()
    {
        return $this->entityManager->getRepository(User::class)
            ->findAll();
    }

    public function getById($id) {
        return $this->entityManager->getRepository(User::class)
            ->find($id);
    }
}

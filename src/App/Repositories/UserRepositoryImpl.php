<?php
namespace Katapoka\Kow\App\Repositories;

use Katapoka\Kow\App\Repositories\Contracts\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function getAll()
    {
        return [['id' => 1, 'nome' => 'William']];
    }
}

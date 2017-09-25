<?php
namespace Katapoka\Kow\App\Repositories;

use Katapoka\Kow\App\Models\User;
use Katapoka\Kow\App\Repositories\Contracts\UserRepository;

class UserRepositoryImpl extends AbstractDbRepository implements UserRepository
{
    protected function getClass()
    {
        return User::class;
    }
}

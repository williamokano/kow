<?php
namespace Katapoka\Kow\App\Repositories\Contracts;

interface UserRepository
{
    public function getAll();
    public function getById($id);
}

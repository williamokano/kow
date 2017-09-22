<?php
namespace Katapoka\Kow\App\Services\Contracts;

interface UserService
{
    public function getAll();
    public function getById($id);
}

<?php
namespace Katapoka\Kow\App\Repositories\Contracts;

interface Repository
{
    public function getAll();
    public function getById($id);
    public function getBy($field, $value);
}

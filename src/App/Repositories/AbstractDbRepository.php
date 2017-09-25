<?php
namespace Katapoka\Kow\App\Repositories;

use Doctrine\ORM\EntityManager;
use Katapoka\Kow\App\Repositories\Contracts\Repository;

abstract class AbstractDbRepository implements Repository
{
    /**
     * @Inject
     * @var EntityManager
     */
    protected $entityManager;
    public function getAll()
    {
        return $this
            ->repository()
            ->findAll();
    }

    /**
     * @param $id
     * @return null|object
     */
    public function getById($id) {
        return $this
            ->repository()
            ->find($id);
    }

    /**
     * @param $field
     * @param $value
     * @return array
     */
    public function getBy($field, $value)
    {
        return $this
            ->repository()
            ->findBy([$field, $value]);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    private function repository()
    {
        return $this->entityManager->getRepository($this->getClass());
    }


    abstract protected function getClass();
}

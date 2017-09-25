<?php
namespace unit\App\Repositories;

use Katapoka\Kow\App\Repositories\UserDbRepositoryImpl;
use unit\App\AppTestCase;

class UserRepositoryImplTest extends AppTestCase
{
    public function testGetAll()
    {
        $repo = new UserDbRepositoryImpl();
        $res = $repo->getAll();

        $this->assertTrue(is_array($res));
        $this->assertEquals(1, count($res));
    }
}

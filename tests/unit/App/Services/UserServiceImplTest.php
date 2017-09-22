<?php

namespace unit\App\Services;

use Katapoka\Kow\App\Repositories\Contracts\UserRepository;
use Katapoka\Kow\App\Services\UserServiceImpl;
use unit\App\AppTestCase;

class UserServiceImplTest extends AppTestCase
{
    /**
     * @throws \DI\DependencyException
     */
    public function testGetAll()
    {
        $userRepoMock = \Mockery::mock(UserRepository::class);
        $userRepoMock->shouldReceive('getAll')->andReturn([]);
        $container = $this->getContainer([
            UserRepository::class => $userRepoMock
        ]);

        $userService = new UserServiceImpl();
        $container->injectOn($userService);
        $res = $userService->getAll();

        $this->assertTrue(is_array($res));
        $this->assertEquals(0, count($res));
    }
}

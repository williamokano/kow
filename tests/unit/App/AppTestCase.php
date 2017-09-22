<?php
namespace unit\App;

use DI\ContainerBuilder;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class AppTestCase extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @param array $definitions
     * @return \DI\Container
     */
    protected function getContainer(array $definitions = [])
    {
        $builder = new ContainerBuilder();
        $builder->useAnnotations(true);
        $builder->addDefinitions($definitions);

        return $builder->build();
    }
}

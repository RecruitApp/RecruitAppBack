<?php

namespace App\Tests\Behat\Manager;

use ApiPlatform\Core\Api\IriConverterInterface;
use Fidry\AliceDataFixtures\Loader\PersisterLoader;
use Fidry\AliceDataFixtures\ProcessorInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class FixtureManager implements ProcessorInterface
{
    /**
     * Fixture table
     *
     * @var array[]
     */
    public array $fixtures;


    /**
     * @var PersisterLoader
     */
    private $fixtureLoader;

    public function __construct(IriConverterInterface $iriConverter, KernelInterface $kernel)
    {
        $this->fixtureLoader = $kernel->getContainer()->get('fidry_alice_data_fixtures.loader.doctrine');
    }

    /**
     * Load Fixtures
     *
     * @param array $files
     */
    public function load(array $files): void
    {
        $this->fixtureLoader->load($files);
    }

    /**
     * @inheritdoc
     */
    public function preProcess(string $fixtureId, $object): void
    {
        // do nothing now
    }

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function postProcess(string $fixtureId, $object): void
    {
        $this->fixtures[$fixtureId] = $object;
        //dump($this->fixtures);
    }
}

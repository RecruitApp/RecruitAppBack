<?php

namespace App\Tests\Behat\Manager;

class ReferenceManager
{
    private FixtureManager $fixtureManager;

    public function getResource(string $resource): string
    {
        dump($resource);
        $array = $this->fixtureManager->fixtures;
        dump($array);
        $result = $array[$resource] ?? null;
        dump($result);
        return $result;
    }
}

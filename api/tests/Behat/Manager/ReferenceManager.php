<?php

namespace App\Tests\Behat\Manager;

class ReferenceManager
{
    private FixtureManager $fixtureManager;

    public function get(string $id): string
    {
        dump($this->fixtureManager->fixtures);
        foreach ($this->fixtureManager->fixtures as $property => $value) {
            preg_match('/^@.*$/', $value, $matches);
            if(sizeof($matches) > 0) {
                $entity = preg_replace('/[^A-Za-z\-]/', '', $matches[0]);
                $newValue = '/'.$entity.'s/'.$this->fixtureManager->fixtures[substr($matches[0], 1)];
                $this->$property = $newValue;
            }
        }
    }
}

<?php
namespace App\DataFixtures\Faker\Provider;


class StatusProvider
{
    public static function RandStatus()
    {
        $Status = ["Créé", "Ouvert", "En validation", "RDV fixé", "Accepté", "Refusé"];
        return $Status[rand(0, 5)];

    }
}

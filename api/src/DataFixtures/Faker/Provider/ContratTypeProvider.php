<?php
namespace App\DataFixtures\Faker\Provider;


class ContratTypeProvider
{
    public static function RandTypeContrat()
    {
        $contratType = ['CDD', 'CDI', 'Alternance', 'Stage', 'V.I.E', 'Recherche'];
        return array_rand($contratType);

    }
}

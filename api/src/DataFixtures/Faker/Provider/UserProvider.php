<?php
namespace App\DataFixtures\Faker\Provider;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserProvider
{

    private static $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        self::$passwordEncoder = $passwordEncoder;
    }

    public static function encodePwd($pwd)
    {
        $user = new User();
        return $passwordEncoded = self::$passwordEncoder->encodePassword($user, $pwd);
    }
}
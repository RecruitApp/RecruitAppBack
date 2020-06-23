<?php
namespace App\DataFixtures\Faker\Provider;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class PasswordProvider
{
   public static function encode_password($password, User $user, UserPasswordEncoderInterface $passwordEncoder)
   {

       $passwordEncoded = $passwordEncoder->encodePassword($user, $password);

       return $passwordEncoded;
   }
}
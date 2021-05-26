<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user 
            ->setFirstname('Emilie')
            ->setLastname('Rouy')
            ->setEmail('rouyemilie82@gmail.com')
            ->setBirtyAt(new \DateTime())
            ->setIsValidate(true)
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordEncoder->encodePassword($user,'azerty'));

        $manager->persist($user);    
        $manager->flush();
    }
}

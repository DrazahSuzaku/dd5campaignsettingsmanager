<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Uid\Uuid;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public const ADMIN1 = 'admin1';
    public const SUPERADMIN = 'superadmin';

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        $admin1 = new User();
        $uuid1 = Uuid::v4();
        $admin1->setEmail("drazahsuzaku@gmail.com");
        $admin1->setUuid($uuid1);
        $admin1->setPassword($this->passwordHasher->hashPassword($admin1, 'admin'));
        $admin1->setRoles(['ROLE_ADMIN']);
        $admin1->setPseudo('Drazah');
        $this->addReference(self::ADMIN1,$admin1);
        $manager->persist($admin1);

        $superAdmin = new User();
        $uuid2 = Uuid::v4();
        $superAdmin->setEmail("eric.hazard31@gmail.com");
        $superAdmin->setUuid($uuid2);
        $superAdmin->setPassword($this->passwordHasher->hashPassword($superAdmin, 'admin'));
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $superAdmin->setPseudo('Eric');
        $this->addReference(self::SUPERADMIN,$superAdmin);
        $manager->persist($superAdmin);

        $manager->flush();
    }
}

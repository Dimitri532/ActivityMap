<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("Dimitri.p53@live.fr");
        $admin->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($admin, '1234');
        $admin->setPassword($password);
        $admin->setFirstName("Dimitri");
        $admin->setLastName("Paillard");
        $manager->persist($admin);
        $this->setReference("user-admin",$admin);

        $john = new User();
        $john->setEmail("john.doe@gmail.com");
        $password = $this->encoder->encodePassword($john, '1234');
        $john->setPassword($password);
        $john->setFirstName("John");
        $john->setLastName("Doe");
        $manager->persist($john);
        $this->setReference("user-john",$john);

        $dimi = new User();
        $dimi->setEmail("dimidu53@live.fr");
        $password = $this->encoder->encodePassword($dimi, 'azerty1234');
        $dimi->setPassword($password);
        $dimi->setFirstName("Dimi");
        $dimi->setLastName("Lesinge");
        $manager->persist($dimi);
        $this->setReference("user-dimi",$dimi);

        $manager->flush();
    }
}
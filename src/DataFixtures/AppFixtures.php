<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $role_admin_system = new Role();
        $role_admin_system->setLibelle("ROLE_ADMIN_SYSTEM");
        $manager->persist($role_admin_system);

        $role_admin = new Role();
        $role_admin->setLibelle("ROLE_ADMIN");
        $manager->persist($role_admin);

        $role_caissier = new Role();
        $role_caissier->setLibelle("ROLE_CAISSIER");
        $manager->persist($role_caissier);

        $role_partenaire = new Role();
        $role_partenaire->setLibelle("ROLE_PARTENAIRE");
        $manager->persist($role_partenaire);

        $this->addReference('role_admin_system',$role_admin_system);        
        $roleAdmdinSystem = $this->getReference('role_admin_system');

        $user1 = new User();
        $user1->setUsername("AdminSys");
        $user1->setRole($roleAdmdinSystem);
        $user1->setPassword($this->encoder->encodePassword($user1, "adminsys"));
       // $user1->setRoles(json_encode(array("ROLE_ADMIN_SYSTEM")));
        $user1->setPrenom("Ibou");
        $user1->setNom("Diakhate");
        $user1->setAdresse("Dakar");
        $user1->setTelephone(777744555);
        $user1->setEmail("Diak1@gmail.com");
        //var_dump($user1->getRoles());die();
       //$user1->setIsActive("active");
        $manager->persist($user1);    
        
        $manager->flush();
        
    }
}
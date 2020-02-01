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

        $this->addReference('role_admin_system',$role_admin_system);
        $this->addReference('role_admin',$role_admin);
        $this->addReference('role_caissier',$role_caissier);
        
        $roleAdmdinSystem = $this->getReference('role_admin_system');
        $roleAdmin = $this->getReference('role_admin');
        $roleCaissier = $this->getReference('role_caissier');

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
        $user1->setNin(7744555);
        //var_dump($user1->getRoles());die();
       //$user1->setIsActive("active");
        $manager->persist($user1);
        
        $admin = new User();
        $admin->setUsername("Admin");
        $admin->setPassword($this->encoder->encodePassword($admin, "admin"));
        $admin->setPrenom("Amadou");
        $admin->setNom("Diop");
        $admin->setAdresse("Dakar");
        $admin->setEmail("Diop1@gmail.com");
        $admin->setTelephone(777744556);
        $admin->setNin(77744555);
        $admin->setRole($roleAdmin);
        //var_dump($admin->getisActive());die();

        $manager->persist($admin);      
        
        $manager->flush();
        
    }
}
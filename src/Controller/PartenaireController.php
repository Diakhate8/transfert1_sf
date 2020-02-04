<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Partenaire;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @Route("/api")
 */
class PartenaireController extends AbstractController
{
    // private $tokenStorage;
    // public function __construct(TokenStorageInterface $TokenStorage)
    // {
    //    $this->tokenStorage = $TokenStorage;
    // }

    // /**
    //  * @Route("/newpartenaire", name="partenaire.new", methods={"Post"})
    //  */
    // public function newPartenaire(Request $request,SerializerInterface $serializer, 
    // EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder) 
    // {
    //     $jsonRecu = $request->getContent(); 
    //     //var_dump($jsonRecu);die();
    //         $donneeRecu = json_decode($jsonRecu);
    //         //var_dump($partenaire);die();

    //         if($donneeRecu->nomeroCompte && $donneeRecu->ninea && $donneeRecu->rc){
    //             $partenaire = new Partenaire();
    //             $user = new User();

    //                 //creationn de  new user
    //         $roleRepo=$this->getDoctrine()->getRepository(Role::class);
    //         $role = $roleRepo->find($donneeRecu->role);
    //         var_dump($role);die();
    //         $user->setPrenom($donneeRecu->prenom);
    //         $user->setNom($donneeRecu->nom);
    //         $user->setAdresse($donneeRecu->adresse);
    //         $user->setTelephone($donneeRecu->telephone);
    //         $user->setEmail($donneeRecu->email);
    //         $user->setNin($donneeRecu->nin);
    //         $user->setUsername($donneeRecu->username);
    //         $user->setPassword($donneeRecu->password);
    //         $user->setrole($role);
    //         $em->persist($user);

                            
    //             //creation de  new partenaire
    //             $partenaire->setNomeroCompte($donneeRecu->nomeroCompte);
    //             $partenaire->setNinea($donneeRecu->ninea);
    //             $partenaire->setRc($donneeRecu->rc);
    //             $em->persist($partenaire);
    //             $em->flush();
    //         }

    //         //


    // }



}

<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Partenaire;
use App\Utule\CompteGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
/**
 * @Route("/api")
 */
class PartenaireController extends AbstractController
{
    private $tokenStorage;
    public function __construct(TokenStorageInterface $tokenStorage)
    {
       $this->tokenStorage = $tokenStorage;
    }
    /**
     * @Route("/newpartenaire", name="partenaire.new", methods={"Post"})
     */
    public function newPartenaire(Request $request,SerializerInterface $serializer, 
    EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder,
    CompteGenerator $gener_compte  ) 
    {
       // $userOnline = $this->tokenStorage->getToken()->getUser();.
        // dd($userOnline); ok
        $jsonRecu = $request->getContent(); 
        //var_dump($jsonRecu);die();  OK
        $donneeRecu = json_decode($jsonRecu);
        //var_dump($partenaire);die(); OK
      
        $partenaire = new Partenaire();
        $user = new User();
        $compte = new Compte();
        $depot = new Depot();

        $ninea = $donneeRecu->ninea;
        $soldedepot = $donneeRecu->soldeDepot;// dd($soldedepot);  ok
        $numbCompte = $gener_compte->generateNumbCompte();// dd($numbCompte);  ok         
        
        //creation de  new partenaire
        $partenaire->setNinea($ninea);
        $partenaire->setRc($donneeRecu->rc);
        $partenaire->setNumeroCompte($numbCompte);
        // dd($partenaire); ok 
        $em->persist($partenaire);
        $em->flush();

        //Recuperation de lid partenaire
        $partenaireRepo = $this->getDoctrine()->getRepository(Partenaire::class);
        $idPartenaire = $partenaireRepo->findOneBy(array("id" => $this->getLastId()));
        // dd($idPartenaire);
        //creationn de  new user
        $roleRepo=$this->getDoctrine()->getRepository(Role::class);
        $role = $roleRepo->findOneBy(array("libelle"=>"ROLE_PARTENAIRE"));
        //var_dump($role);die(); role partenaire attribut
        $user->setRole($role);
        $user->setPrenom($donneeRecu->prenom);
        $user->setNom($donneeRecu->nom);
        $user->setAdresse($donneeRecu->adresse);
        $user->setTelephone($donneeRecu->telephone);
        $user->setEmail($donneeRecu->email);
        $user->setUsername($donneeRecu->username);
        $user->setPassword($userPasswordEncoder->encodePassword($user, $donneeRecu->password));            
        $user->setPartenaire($idPartenaire);
        // dd($user);   
        $em->persist($user);
        $em->flush();

            // creation du compte partenaire

        $compte->setCreatedAt(new \DateTime());
        $compte->setNinea($ninea);
        $compte->setNumeroCompte($numbCompte);
        $compte->setSoldeInitial($soldedepot);
        if(($compte->getSoldeInitial($soldedepot))< 500000){
            $data= [
                "status" => 400,
                "message" => " Le solde initial de depot doit etre supperieur a 500000"              
            ];
            return new JsonResponse($data, 400);
        }
        $compte->setPartenaire($idPartenaire);
        // dump($compte);die(); ok
        $em->persist($compte);
        $em->flush();

        // creation du premier depot partenaire
        $compteRepo = $this->getDoctrine()->getRepository(Compte::class);
        $idCompte = $compteRepo->findOneBy(array("id" => $this->getLastIdCompte()));

        $depot->setCompte($idCompte);
        $depot->setCreatedAt(new \DateTime());
        $depot->setNumeroCompte($numbCompte);
        $depot->setCompte($idCompte);
        $depot->setSoldeDepot($soldedepot);
            // dd($depot);ok 
        $em->persist($depot);
        
        $em->flush();

            $data= [
                "status" => 201,
                "message" => " Partenaire Creer avec succes"              
            ];
            return new JsonResponse($data, 201);

    }

    public function getLastId() 
    {
        $repository = $this->getDoctrine()->getRepository(Partenaire::class);
        // look for a single Product by name
        $res = $repository->findBy(array(), array('id' => 'DESC')) ;
        if($res == null){
            return $res[0]=1;
        }else{
            return $res[0]->getId();
        }
        
    }

    public function getLastIdCompte() 
    {
        $repository = $this->getDoctrine()->getRepository(Compte::class);
        // look for a single Product by name
        $res = $repository->findBy(array(), array('id' => 'DESC')) ;
        if($res == null){
            return $res[0]=0;
        }else{
            return $res[0]->getId();
        }
        
    }


}
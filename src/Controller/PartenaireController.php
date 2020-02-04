<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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

    /**
     * @Route("/newpartenaire", name="partenaire.new", methods={"Post"})
     */
    public function newPartenaire(Request $request,SerializerInterface $serializer, 
    EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder   ) 
    {
        $jsonRecu = $request->getContent(); 
        //var_dump($jsonRecu);die();
            $donneeRecu = json_decode($jsonRecu);
            //var_dump($partenaire);die();

      
                $partenaire = new Partenaire();
                $user = new User();

                //creation de  new partenaire
                $repo_partenaire = $this->getDoctrine()->getRepository(Partenaire::class);
                $partenaire_id = $repo_partenaire->findOneBy(array("id" => $this->getLastId()));

                $partenaire->setNumeroCompte($donneeRecu->numeroCompte);
                $partenaire->setNinea($donneeRecu->ninea);
                $partenaire->setRc($donneeRecu->rc);
                $em->persist($partenaire);
                $em->flush();
                
                //creationn de  new user
                    // rolepartenaire
            $roleRepo=$this->getDoctrine()->getRepository(Role::class);
            $role = $roleRepo->findOneBy(array("libelle"=>"ROLE_PARTENAIRE"));
            //var_dump($role);die(); role partenaire attribue

            $user->setRole($role);
            $user->setPrenom($donneeRecu->prenom);
            $user->setNom($donneeRecu->nom);
            $user->setAdresse($donneeRecu->adresse);
            $user->setTelephone($donneeRecu->telephone);
            $user->setEmail($donneeRecu->email);
            $user->setUsername($donneeRecu->username);
            $user->setPassword($donneeRecu->password);
            $user->setPartenaire($partenaire_id);
            $em->persist($user);
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
            return 0;
        }else{
            return $res[0]->getId();
        }
        
    }


}

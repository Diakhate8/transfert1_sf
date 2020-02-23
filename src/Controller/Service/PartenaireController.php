<?php

namespace App\Controller\Service;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Contrat;
use App\Entity\Partenaire;
use App\Utule\CompteGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @Route("/api")
 */
class PartenaireController extends AbstractController
{

    /**
     * @Route("/newpartenaire", name="partenaire.new", methods={"Post"})
     */
    public function newPartenaire(Request $request, 
    EntityManagerInterface $em, UserPasswordEncoderInterface $userPasswordEncoder,
    CompteGenerator $generCompte ) 
    { 
        $userOnline = $this->getUser();
        // dd($userOnline);

        $jsonRecu = $request->getContent(); 
        //var_dump($jsonRecu);die();  OK
        $donneeRecu = json_decode($jsonRecu);
        // dd($donneeRecu); 

        $user = new User();
        $partenaire = new Partenaire();
        $compte = new Compte();
        $depot = new Depot();

        $ninea = $donneeRecu->ninea;
        $rc = $donneeRecu->rc ;
        $soldeDepot = $donneeRecu->soldeInitial ;

                    //creation de  new partenaire
        $partenaire->setNinea($ninea);
        $partenaire->setRc($rc);
        // dd($partenaire);  ok
        $em->persist($partenaire);
        // $em->flush();    ok

                    //creation de  new user
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
        $user->setPartenaire($partenaire);
        // dd($user);   ok
        $em->persist($user);
        // $em->flush();ok

        //     // creation du compte partenaire
        $numbCompte = $generCompte->generateNumbCompte();
        //dd($numbCompte);   
        // $compte->setCreatedAt(new \DateTime());

        if($soldeDepot < 500000){
            $data= [
                "status" => 400,
                "message" => " Le solde initial de depot doit etre supperieur a 500000"              
            ];
            return new JsonResponse($data, 400);
        }
        $compte->setSoldeInitial($soldeDepot);
        $compte->setPartenaire($partenaire);
        $compte->setNumeroCompte($numbCompte);
        $compte->setUserCreateur($userOnline);
        // dd($compte);

        
        $em->persist($compte);

                // creation du premier depot partenaire
        $depot->setCompte($compte);
        $depot->setNumeroCompte($numbCompte);
        $depot->setMontantDepot($soldeDepot);
        $depot->setCreatedAt(new \DateTime());
        $depot->setUserCreateur($userOnline);

        // $depot->setCompte($idCompte);
            //  dd($depot);
        $em->persist($depot);
        
        $contrat = new Contrat();
        $contratRepo=$this->getDoctrine()->getRepository(Contrat::class);
        $entityCantrat = $contratRepo->findOneBy(array("id"=>1));
        
        $contrat->setIntitule(" Contrat:Entre les soussignés:\r\n ".$donneeRecu->prenom." ".$donneeRecu->prenom." 
        et \r\n  ci-après dénommé le partenariat:Les Comptes du Partenaires\r\n 
        il a été arrêté et convenu ce qui suit :\';\r\n  ")
                ->setArticleA($entityCantrat->getArticleA())
                ->setArticleB($entityCantrat->getArticleB())
                ->setArticleC($entityCantrat->getArticleC())
                ->setArticleD($entityCantrat->getArticleD())
                ->setArticleE($entityCantrat->getArticleE());
                dd($contrat);
          $em->persist($contrat);

        $em->flush();

            $data= [
                "status" => 201,
                "message" => " Partenaire Creer avec succes"              
            ];
            return new JsonResponse($data, 201);

    }

    // public function getLastId() 
    // {
    //     $repository = $this->getDoctrine()->getRepository(Partenaire::class);
    //     // look for a single Product by name
    //     $res = $repository->findBy(array(), array('id' => 'DESC')) ;
    //     if($res == null){
    //         return $res[0]=0;
    //     }else{
    //         return $res[0]->getId();
    //     }
        
    // }

    // public function getLastIdCompte() 
    // {
    //     $repository = $this->getDoctrine()->getRepository(Compte::class);
    //     // look for a single Product by name
    //     $res = $repository->findBy(array(), array('id' => 'DESC')) ;
    //     if($res == null){
    //         return $res=0;
    //     }else{
    //         return $res[0]->getId();
    //     }
        
    // }


}
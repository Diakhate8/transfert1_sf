<?php

namespace App\Controller\Agence;

use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AffectationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * @Route("/api")
 */
class EnvoieCrontrollerController extends AbstractController
{ 
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    /**
     * @Route("/newenvoie", name="newenvoie", methods={"Post"})
     */
    public function newEnvoie(Request $request, EntityManagerInterface $em,
    ValidatorInterface $validator,Security $security, AffectationRepository $affectRipo, CompteRepository $compteRipo)
    {
        $userOnline = $this->tokenStorage->getToken()->getUser();
        $donneeRecu = json_decode($request->getContent());
            $entityAffectation = $affectRipo->findOneBy(array("user"=>$userOnline));
            $EntityCompte = $entityAffectation->getCompte();
            $infosCompte = $compteRipo->findOneBy(array("id"=>$EntityCompte));
        //  dd($infosCompte);
         $compteEnv = $infosCompte ;
        // dd($infosCompte);

    //Transaction pour un User Partenaitre   
        try{
            //declaration et affectation des variable
            $prenomEnv = $donneeRecu->prenomEnv;
            $nomEnv = $donneeRecu->nomEnv ;
            $telephoneEnv = $donneeRecu->telephoneEnv ;
            // $identite= $donneeRecu->ninCorrespondant ;

            $prenomB= $donneeRecu->prenomCorrespondant;
            $nomB = $donneeRecu->nomCorrespondant ;
            $telephoneB = $donneeRecu->telephoneCorrespondant ;
            $identite= $donneeRecu->ninCorrespondant ;
            $mode = $donneeRecu->mode ;
            $solde=0; 
            $code=0;
    //mode envoie ou retrait        
            if($mode=="envoie"){
                $code = rand(100,999999999) ;
                $solde = $donneeRecu->solde ;
            }elseif($mode=="retrait"){
                $code = $donneeRecu->code;
            }else{
                throw new Exception('Voulez vous faire un envoie ou retrait');
            }
            $jour = new \DateTime('now');
    //controlle des frais

        $data= [
            "status" => 201,
            "message" => " Depot effectue avec succes" ];
        return $this->json($data, 201);

        }catch(notEncodableValueExeption $e){
            return $this->json(["status" => 400, "message" => $e->getMessage()], 400);
        }
    }
}

<?php

namespace App\Controller\Agence;

use App\Entity\Transaction;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AffectationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

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
            $identiteB = $donneeRecu->ninCorrespondant ;
            $mode = $donneeRecu->mode ;
            $solde = $donneeRecu->solde ;

        //MODE ENVOIE       
            if($mode=="envoie"){
                $code = rand(100,999999999) ;
            }else{
                throw new Exception('Voulez vous faire un envoie ou retrait');
            }
            $jour = new \DateTime('now');
                    //controlle des frais
        //Ajout d'une transaction
            $transaction = new Transaction();
            $transaction->setCompteDeDepot($infosCompte)
                        ->setPrenomEnv($prenomEnv)
                        ->setNomEnv($nomEnv)
                        ->setTelephoneEnv($telephoneEnv)
                        ->setMode($mode)
                        ->setSolde($solde)
                        ->setCode($code)
                        ->setPrenomCorrespondant($prenomB)
                        ->setNomCorrespondant($nomB)
                        ->setNinCorrespondant($identiteB)
                        ->setTelephoneCorrespondant($telephoneB)
                        ->setCreatedAt($jour)
                        ->setUserCreateur($userOnline);
                // dd($transaction);
            $em->persist($transaction);

            $errors= $validator->validate($transaction);
            if(count($errors) >0){
                return $this->json($errors, 400);
            }
            //Mis a jour du compte
            $soldeCompte = $infosCompte->getSoldeInitial();
            $infosCompte->setSoldeInitial($soldeCompte-$solde);
            //  dd($infosCompte); 
            
        $data= [
            "status" => 201,
            "message" => " Depot effectue avec succes" ];
        return $this->json($data, 201);

        }catch(notEncodableValueExeption $e){
            return $this->json(["status" => 400, "message" => $e->getMessage()], 400);
        }
    }
}

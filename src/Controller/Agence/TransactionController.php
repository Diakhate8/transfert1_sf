<?php

namespace App\Controller\Agence;

use App\Entity\Compte;
use App\Entity\Rapport;
use App\Utule\CalculFrais;
use App\Entity\Transaction;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
 *  @IsGranted({"ROLE_PARTENAIRE", "ROLE_ADMIN_PARTENAIRE"}, statusCode=404, 
 * message=" Access refuser vous n'etes pas un administrateur")
 * @Route("/api")
 */
class TransactionController extends AbstractController
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    /**
     * @Route("/newtransactionE", name="transaction.add", methods={"Post"})    
     */
    public function envoie(Request $request, EntityManagerInterface $em, 
       CalculFrais $calculFrais, ValidatorInterface $validator){
        $userOnline = $this->tokenStorage->getToken()->getUser();
        // dd($userOnline); ok
        $userPartenaire= $userOnline->getPartenaire();
        // dd($userPartenaire); ok
        $donneeRecu = json_decode($request->getContent());

        //TRANSACTION FAITE PAR LE PARTENAIRE OU ADMIN_PARTENAIRE
            //Recuperation du compte User
        $compteRipo = $this->getDoctrine()->getRepository(Compte::class);
        $Entitycompte = $compteRipo->findOneBy(array('partenaire' => $userPartenaire)) ;
        // dd($Entitycompte);   ok        
        
        //declaration et affectation des variable
            $compteEnv = $Entitycompte->getNumeroCompte();
            $prenomEnv = $donneeRecu->prenomEnv;
            $nomEnv = $donneeRecu->nomEnv ;
            $telephoneEnv = $donneeRecu->telephoneEnv ;
            $identiteEnv = $donneeRecu->ninClient ; 

            $prenomB = $donneeRecu->prenomCorrespondant;
            $nomB = $donneeRecu->nomCorrespondant ;
            $telephoneB = $donneeRecu->telephoneCorrespondant ;

            $code = rand(100,999999999) ;
            $mode = $donneeRecu->mode ;
            $solde = $donneeRecu->solde ;
            $jour = new \DateTime('now');

        // Calcule Cdes frais
            $frais = $calculFrais->genereFrais($solde);           
        //Ajout d'une transaction
        try{
            $transaction = new Transaction();
            $transaction->setCompteDeDepot($Entitycompte)
                        ->setPrenomEnv($prenomEnv)
                        ->setNomEnv($nomEnv)
                        ->setTelephoneEnv($telephoneEnv)
                        ->setNinClient($identiteEnv)
                        ->setMode($mode)
                        ->setSolde($solde)
                        ->setCode($code)
                        ->setPrenomCorrespondant($prenomB)
                        ->setNomCorrespondant($nomB)
                        ->setTelephoneCorrespondant($telephoneB)
                        ->setCreatedAt($jour)
                        ->setUserCreateur($userOnline)
                        ->setFrais($frais)
                        ->setPartAgenceE($frais*(10/100))
                        ->setPartAgenceR($frais*(20/100))
                        ->setPartEtat($frais*(30/100))
                        ->setPartService($frais*(40/100));
                //  dd($transaction);   ok
            $em->persist($transaction);

            $errors= $validator->validate($transaction);
            if(count($errors) >0){
                return $this->json($errors, 400);
            }
            //Mis a jour du compte
                $soldeCompte = $Entitycompte->getSoldeInitial();
                if($soldeCompte<$solde){
                    throw new Exception("Le solde de votre compte ne vous permet pas d'envoyer ".$solde);
                }
                $Entitycompte->setSoldeInitial($soldeCompte-$solde);
                $Entitycompte->setNumeroCompte($compteEnv);
            // dd($Entitycompte);  ok
                //Rapport
                $rapport = new Rapport();
                if($mode=="envoie"){
                    $part=($frais*(10/100));
                }
                if($mode=="retrait"){
                    $part=($frais*(20/100));
                }
                $rapport->setCompteTransact($Entitycompte)
                        ->setCreatedAt($jour)  
                        ->setPartAgence($part)
                        ->setMode($mode)
                        ; 
                $em->persist($rapport);
            $em->flush();

            // if(!$Entitycompte){a

            //  throw new Exception("No Compte found for numero compte ".$donneeRecu->numeroCompte);  a          
            //     }   a

                $data= [
                    "status" => 201,
                    "message" => " Depot effectue avec succes" ];
                return $this->json($data, 201);

        }catch(notEncodableValueExeption $e){
            return $this->json([
            "status" => 400,
            "message" => $e->getMessage()
            ], 400);
        }
    }


    /**
     * @Route("/newtransactionR", name="transaction.sub", methods={"Post"})    
     */
    public function retrait(Request $request, EntityManagerInterface $em, TransactionRepository $transactRipo, 
    ValidatorInterface $validator, Security $security){
        // $userOnline = $this->$security->getToken()->getUser();
        $userOnline = $this->getUser();
        // $this->denyAccessUnlessGranted("ROLE_ADMIN_SYSTEME")  ;      
        $userPartenaire= $userOnline->getPartenaire();

        //TRANSACTION RETRAIT FAIT PAR LE PARTENAIRE OU ADMIN_PARTENAIRE
        $donneeRecu = json_decode($request->getContent());

            //Recuperation du compte User
        $compteRipo = $this->getDoctrine()->getRepository(Compte::class);
        $Entitycompte = $compteRipo->findOneBy(array('partenaire' => $userPartenaire)) ;
        $numbcompte = $Entitycompte->getNumeroCompte();

        // dd($Entitycompte);   ok        
        try{    
                //declaration et affectation des variable
            $mode = $donneeRecu->mode ;
            $code = $donneeRecu->code ;
            $identiteB = $donneeRecu->ninCorrespondant ;
            
            // Find code
            $transaction = $transactRipo->findOneBy(array('code'=>$code)) ;
            if(!$transaction){
                throw new Exception("Code ".$code." est invalide");
            }
                $status=$transaction->getMode();
            // dd($status);
            if($status== "retrait"){
                throw new Exception("Un retrait est deja fait pour le code ".$code);
            }
            $solde = $transaction->getSolde();
                // dd($solde);

                //Ajout d'une transaction       
            $transaction->setMode($mode)
                        // ->setCreatedAt($jour)
                        ->setNinCorrespondant($identiteB)
                        ->setCompteDeRetrait($Entitycompte);
                        // ->setUserCreateur($userOnline);
                //  dd($transaction);   ok

            $errors= $validator->validate($transaction);
            if(count($errors) >0){
                return $this->json($errors, 400);
            }
            //Mis a jour du compte
                $soldeCompte = $Entitycompte->getSoldeInitial();
                // if($soldeCompte<$solde){
                //     throw new Exception("Le solde de votre compte ne vous permet pas d'envoyer ".$solde);
                // }
                $Entitycompte->setSoldeInitial($soldeCompte+$solde);
                $Entitycompte->setNumeroCompte($numbcompte);
            //  dd($Entitycompte); 
                $em->persist($Entitycompte);
                
                $em->flush();
                $data= [
                    "status" => 201,
                    "message" => " Retrait de ".$solde." effectue avec succes" ];
                return $this->json($data, 201);
                    $em->flush();
        }catch(notEncodableValueExeption $e){
            return $this->json([
            "status" => 400,
            "message" => $e->getMessage()
            ], 400);
        }
    }

}

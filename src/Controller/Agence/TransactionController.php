<?php

namespace App\Controller\Agence;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Transaction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
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
     * @Route("/newtransaction", name="transaction.add", methods={"Post"})    
     */
    public function envoie(Request $request, EntityManagerInterface $em,
    ValidatorInterface $validator){
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

            // $identite= $donneeRecu->ninCorrespondant ; ok
            $prenomB = $donneeRecu->prenomCorrespondant;
            $nomB = $donneeRecu->nomCorrespondant ;
            $telephoneB = $donneeRecu->telephoneCorrespondant ;

            $code = rand(100,999999999) ;
            $mode = $donneeRecu->mode ;
            $solde = $donneeRecu->solde ;
            $jour = new \DateTime('now');
    //controlle des frais
            $frais = 0 ;
                switch($solde){
                    case ($solde<=495):
                        $frais = 25;
                    break;
                    case ($solde>495 && $solde<=1100):
                        $frais = 90;
                    break;
                    case ($solde>1100 && $solde<=3000):
                        $frais = 180;
                    break;
                    case ($solde>3000 && $solde<=5000):
                        $frais = 350;
                    break;
                    case ($solde>5000 && $solde<=10000):
                        $frais = 500;
                    break;
                    case ($solde>10000 && $solde<=15000):
                        $frais = 700;
                    break;
                    case ($solde<=15000 && $solde<=20000):
                        $frais = 900;
                    break;
                    case ($solde>20000 && $solde<=35000):
                        $frais = 1400;
                    break;
                    case ($solde>35000 && $solde<=60000):
                        $frais = 1700;
                    break;
                    case ($solde>60000 && $solde<=10000):
                        $frais = 2600;
                    break;
                    case ($solde>100000 && $solde<=175000):
                        $frais = 3500;
                    break;
                    case ($solde>175000 && $solde<=200000):
                        $frais = 4500;
                    break;
                    default:
                        $frais = 0;
                    break;
                }
            // dd($frais);  ok
    //Ajout d'une transaction
        $transaction = new Transaction();
        $transaction->setCompteDeDepot($Entitycompte)
                    ->setPrenomEnv($prenomEnv)
                    ->setNomEnv($nomEnv)
                    ->setTelephoneEnv($telephoneEnv)
                    ->setMode($mode)
                    ->setSolde($solde)
                    ->setCode($code)
                    ->setPrenomCorrespondant($prenomB)
                    ->setNomCorrespondant($nomB)
                    ->setNinCorrespondant($telephoneB)
                    ->setTelephoneCorrespondant($telephoneB)
                    ->setCreatedAt($jour)
                    ->setUserCreateur($userOnline);
            // dd($transaction);    ok
        $em->persist($transaction);
    //Mis a jour du compte
            $soldeCompte = $Entitycompte->getSoldeInitial();
            $Entitycompte->setSoldeInitial($soldeCompte-$solde);
        // dd($Entitycompte);  ok
    //Ajout d'un nouveau depot dans le compte
        $depot= new Depot();

        $depot->setCreatedAt($jour);
        $depot->setNumeroCompte($compteEnv);
        $depot->setMontantDepot($solde);
        $depot->setCompte($Entitycompte);
        $depot->setUserCreateur($userOnline);
        $em->persist($depot);
        // dd($depot);  ok
        $em->flush();

        // if(!$Entitycompte){a

        //  throw new Exception("No Compte found for numero compte ".$donneeRecu->numeroCompte);  a          
        //     }   a

            $data= [
                "status" => 201,
                "message" => " Depot effectue avec succes" ];
            return $this->json($data, 201);

    }



}

<?php

namespace App\Controller\Agence;

use App\Utule\CalculFrais;
use App\Entity\Transaction;
use App\Repository\CompteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AffectationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class EnvoieCrontrollerController extends AbstractController
{ 
    /**
     * @IsGranted("ROLE_CAISSIER_PARTENAIRE", statusCode=404, 
     * message=" Access refuser vous n'etes pas caissier")
     * @Route("/Envoie", name="Envoie.add", methods={"Post"})
     */
    public function newEnvoie(Request $request, EntityManagerInterface $em,
    ValidatorInterface $validator,Security $security, AffectationRepository $affectRipo,
    CalculFrais $calculFrais,  CompteRepository $compteRipo)
    {
        $userOnline = $this->$security->getUser();
        $donneeRecu = json_decode($request->getContent());
            $entityAffectation = $affectRipo->findOneBy(array("user"=>$userOnline));
            $EntityCompte = $entityAffectation->getCompte();
            $infosCompte = $compteRipo->findOneBy(array("id"=>$EntityCompte));
         dd($infosCompte);

    //Transaction pour un User Partenaitre   
        try{
            //declaration et affectation des variable
            $prenomEnv = $donneeRecu->prenomEnv;
            $nomEnv = $donneeRecu->nomEnv ;
            $telephoneEnv = $donneeRecu->telephoneEnv ;
            $identiteEnv = $donneeRecu->ninClient ;

            $prenomB= $donneeRecu->prenomCorrespondant;
            $nomB = $donneeRecu->nomCorrespondant ;
            $telephoneB = $donneeRecu->telephoneCorrespondant ;
            $mode = $donneeRecu->mode ;
            $solde = $donneeRecu->solde ;
            $jour = new \DateTime('Y/M/D');

        //MODE ENVOIE       
            if($mode=="envoie"){
                $code = rand(100,999999999) ;
            }else{
                throw new Exception('Voulez vous faire un envoie ou retrait');
            }
            // Calcule Cdes frais
            $frais = $calculFrais->genereFrais($solde); 
        //Ajout d'une transaction
            $transaction = new Transaction();
            $transaction->setCompteDeDepot($infosCompte)
                        ->setPrenomEnv($prenomEnv)
                        ->setNomEnv($nomEnv)
                        ->setNinClient($identiteEnv)
                        ->setTelephoneEnv($telephoneEnv)
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
            $em->flush();
        $data= [
            "status" => 201,
            "message" => " Depot effectue avec succes" ];
        return $this->json($data, 201);

        }catch(notEncodableValueExeption $e){
            return $this->json(["status" => 400, "message" => $e->getMessage()], 400);
        }
    }
}

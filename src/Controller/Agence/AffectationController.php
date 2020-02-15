<?php

namespace App\Controller\Agence;

use App\Entity\User;
use App\Entity\Affectation;
use App\Repository\UserRepository;
use App\Repository\CompteRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response

/**
 * @Route("/api")
 */
class AffectationController extends AbstractController
{
    /**
     * @Route("/affectation", name="affectation")
     */
    public function affectation(Request $request, ValidatorInterface $validator,
    EntityManagerInterface $em, PartenaireRepository $partenaireRipo,UserRepository $userRipo,
    CompteRepository $compteRipo)
    {
            $userOnline = $this->getUser();
        //Recuperation du partenaire (id) en ligne  dans lentite user 
            $idPartenaire = $userRipo->findOneBy(array('id' => $userOnline ))->getPartenaire() ;
        try{ // dd($idPartenaire);   ok
            //Recuperation des Users du Partenaire 
                $recupUsersP = $userRipo->findBy(array('partenaire' => $idPartenaire )) ;
                // dd($recupUsersP);    ok
            //Recuperation desComptes du Partenaire 
                $comptes = $compteRipo->findBy(array('partenaire' => $idPartenaire )) ;
                // dd($comptes); ok
            //Affection
            $donneeRecu = json_decode($request->getContent());
            if(!$donneeRecu->dateDebut || !$donneeRecu->dateFin || !$donneeRecu->compte){
                // throw new Exceptionr
                return ("Veuillez Remplir toutes les champs");
            }
                $dateD = $donneeRecu->dateDebut;
                $dateF = $donneeRecu->dateFin;
                $numbCompte = $donneeRecu->compte;
                $user = $donneeRecu->user;
            //Modification de la table daffectation
                $affectation = new Affectation();
                $affectation->setDateDebut = $dateD ;
                $affectation->setDateFin = $dateF ;
                $affectation->setUser = $user ;
                $affectation->setCompte = $numbCompte ;

            $errors= $validator->validate($affectation);
            if(count($errors) >0){
                return $this->json($errors, 400);
            }
                // $em->flush();
                
                $data= [
                    "status" => 201,
                    "message" => " Vous venez d affecter un nouveau utulisateur au compte Numero".$numbCompte  ];
                return $this->json($data, 201);
        }catch(notEncodableValueExeption $e){
            return $this->json(["status" => 400, "message" => $e->getMessage()], 400);
        }
    }




}

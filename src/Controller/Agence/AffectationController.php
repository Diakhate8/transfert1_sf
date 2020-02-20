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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class AffectationController extends AbstractController
{
    /**
     * @IsGranted({"ROLE_PARTENAIRE", "ROLE_ADMIN_PARTENAIRE"}, statusCode=404, 
     * message=" Access refuser vous n'etes pas un administrateur")
     * @Route("/affectation", name="affectation")
     */
    public function affectation(Request $request, ValidatorInterface $validator,
    EntityManagerInterface $em, UserRepository $userRipo, CompteRepository $compteRipo)
    {
            $userOnline = $this->getUser();
        //Recuperation du partenaire (id) en ligne  dans lentite user 
            $idPartenaire = $userRipo->findOneBy(array('id' => $userOnline ))->getPartenaire() ;
        // dd($idPartenaire);   ok
            
            //Recuperation des Users du Partenaire 
                // $recupUsersP = $userRipo->findBy(array('userCreateur' => $idPartenaire )) ;
                // dd($recupUsersP);  
            //Recuperation desComptes du Partenaire 
                $comptes = $compteRipo->findBy(array('partenaire' => $idPartenaire )) ;
                
                //  dd($comptes); ok
            try{    
                //Affection
                $donneeRecu = json_decode($request->getContent());
                if(!$donneeRecu->dateDebut || !$donneeRecu->dateFin || !$donneeRecu->compte){
                    // throw new Exceptionr
                    return ("Veuillez Remplir toutes les champs");
                }
                
            //Modification de la table daffectation
                $affectation = new Affectation();
                $affectation->setDateDebut($donneeRecu->dateDebut) 
                            ->setDateFin($donneeRecu->dateFin)
                            ->setUser($donneeRecu->user)
                            ->setCompte($donneeRecu->compte);

            $errors= $validator->validate($affectation);
            if(count($errors) >0){
                return $this->json($errors, 400);
            }
            $em->persist($affectation);
            $em->flush();
                
                $data= [
                    "status" => 201,
                    "message" => " Vous venez d affecter un nouveau utulisateur au compte Numero".$numbCompte  ];
                return $this->json($data, 201);
        }catch(notEncodableValueExeption $e){
            return $this->json(["status" => 400, "message" => $e->getMessage()], 400);
        }
    }




}

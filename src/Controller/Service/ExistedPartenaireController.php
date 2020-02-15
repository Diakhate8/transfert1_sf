<?php

namespace App\Controller\Service;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Partenaire;
use App\Utule\CompteGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/api")
 */
class ExistedPartenaireController extends AbstractController
{
    /**
     * @Route("nouveaucompte", name="nouveaucompte.add")
     */
    public function newPartenaire(Request $request, ValidatorInterface $validator,
    EntityManagerInterface $em,  CompteGenerator $generCompte ){ 
        $userOnline = $this->getUser();
        // dd($userOnline);
        try{

        $donneeRecu = json_decode($request->getContent());        
        // Recuperation du ninea Partenaire 
        $partenaireRipo = $this->getDoctrine()->getRepository(Partenaire::class);
        $EntityPartenaire = $partenaireRipo->findOneBy(array('ninea' => $donneeRecu->ninea)) ;
        // dd($EntityPartenaire); 

        if(!$EntityPartenaire){

            $data= [
                "status" => 500,
                "message" => " No Partenaire found for ninea ".$donneeRecu->ninea           
            ];
            return $this->json($data, 500);
        };
        // dd($EntityPartenaire); 

        $montantDepot = $donneeRecu->montantDepot ;

        if($montantDepot < 500000){
            $data= [
                "status" => 400,
                "message" => " Le solde initial de depot doit etre supperieur a 500000"              
            ];
            return new JsonResponse($data, 400);
        }

        //creation d'un nouveau compte
        $compte = new Compte();
        $numbCompte = $generCompte->generateNumbCompte();
        $compte->setPartenaire($EntityPartenaire);
        $compte->setSoldeInitial($montantDepot);
        $compte->setNumeroCompte($numbCompte);
        $compte->setUserCreateur($userOnline);
        // $compte->setCreatedAt(new \DateTime());

        $em->persist($compte);
        // dd($compte);     ok

        //creation d'un nouveau Depot
        $depot = new Depot();
        $depot->setCompte($compte);
        $depot->setMontantDepot($montantDepot);
        $depot->setNumeroCompte($numbCompte);
        $depot->setUserCreateur($userOnline);
        $depot->setCreatedAt(new \DateTime());


        $em->persist($depot);

        $em->flush();
            $data= [
                "status" => 201,
                "message" => " Nouveau Compte Partenaire .$numbCompte.Creer avec succes"              
            ];
            return new JsonResponse($data, 201);

        }catch(notEncodableValueExeption $e){
            return $this->json([
            "status" => 400,
            "message" => $e->getMessage()
            ], 400);
        }
    }






}
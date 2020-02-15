<?php

namespace App\Controller\Service;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Entity\Partenaire;
use App\Repository\DepotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;



/**
 * @Route("/api")
 */
class DepotController extends AbstractController
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
       
    /**
     * @Route("/newdepot", name="depot.add", methods={"Post"})
     */
    public function newDepot(Request $request, EntityManagerInterface $em,
    ValidatorInterface $validator){

        $userOnline = $this->tokenStorage->getToken()->getUser();
        // $userOnline = $this->getUser(); OR
        // dd($userOnline);

        $jsonRecu = $request->getContent();
        $donneeRecu = json_decode($jsonRecu);
    try{
            $numeroCompte = $donneeRecu->numeroCompte;

        // Recuperation du numero de compte  dans compte partenaire
        // Recuperation de l'entite compte (numero) recu en json
        $compteRipo = $this->getDoctrine()->getRepository(Compte::class);
        $Entitycompte = $compteRipo->findOneBy(array('numeroCompte' => $donneeRecu->numeroCompte)) ;
        // dd($Entitycompte);   ok

        if(!$Entitycompte){

            $errors="No Compte found for numero compte ".$donneeRecu->numeroCompte;
            return $this->json($errors, 500);
        }
        // dd($Entitycompte);   ok
        $montantDepot = $donneeRecu->montantDepot ;

        $depot= new Depot();

        $depot->setCreatedAt(new \DateTime());
        $depot->setNumeroCompte($numeroCompte);
        $depot->setMontantDepot($montantDepot);
        $depot->setCompte($Entitycompte);
        $depot->setUserCreateur($userOnline);

        $errors= $validator->validate($depot);
        if(count($errors) >0){
            return $this->json($errors, 400);
        }
        $em->persist($depot);

        $soldeInitial = $Entitycompte->getSoldeInitial();
        $Entitycompte->setSoldeInitial($soldeInitial+$montantDepot);
        $Entitycompte->setUserCreateur($userOnline);

        // dd($Entitycompte);   ok
        // dd($depot);  ok

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

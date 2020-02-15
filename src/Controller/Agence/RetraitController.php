<?php

namespace App\Controller\Agence;

use App\Entity\Depot;
use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
 * @Route("/api")
 */
class RetraitController extends AbstractController
{   
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    /**
     * @Route("/newretrait", name="retrait.add", methods={"Post"})
     */
    public function retrait(Request $request, EntityManagerInterface $em,TransactionRepository $transactRipo,
    ValidatorInterface $validator){
        $userOnline = $this->tokenStorage->getToken()->getUser();
        // dd($userOnline); ok
        $userPartenaire= $userOnline->getPartenaire();
        // dd($userPartenaire); ok
        $donneeRecu = json_decode($request->getContent());

        //Recuperation du compte User
        $compteRipo = $this->getDoctrine()->getRepository(Compte::class);
        $Entitycompte = $compteRipo->findOneBy(array('partenaire' => $userPartenaire)) ;
        // dd($Entitycompte);   ok
        $code = $donneeRecu->code ;
        $entityTransact = $transactRipo->findOneBy(array('code'=>$code)) ;
        // dd($entityTransact);

        //declaration et affectation des variable
                $compteB = $Entitycompte->getNumeroCompte();    
                // $identite= $donneeRecu->ninCorrespondant ; ok  
                $solde = $Entitycompte->getSoldeInitial();  
                $mode = $donneeRecu->mode ;
                $jour = new \DateTime('now');

                $entityTransact->setCompteDeRetrait($Entitycompte);
            // dd($entityTransact );
            //Ajout d'un nouveau depot dans le compte
            $depot= new Depot();

            $depot->setCreatedAt($jour);
            $depot->setNumeroCompte($compteB);
            $depot->setMontantDepot($solde);
            $depot->setCompte($Entitycompte);
            $depot->setUserCreateur($userOnline);
            $em->persist($depot);
            dd($depot); 
            $em->flush();

        
        $data= [
            "status" => 201,
            "message" => " Retrait de  effectue avec succes" ];
        return $this->json($data, 201);
    }






}

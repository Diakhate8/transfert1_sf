<?php

namespace App\Controller\Service;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/api")
 */
class BlocageController extends AbstractController
{
    /**
     * @IsGranted({"ROLE_ADMIN_SYSTEME","ROLE_ADMIN"}, statusCode=404, 
     * message=" Access refuser ")
     * @Route("/partenairebloc/{id}", name="partenaire.bloc")
     */
    public function blocPartenaire($id , UserRepository $userRepos, Request $request,
    EntityManagerInterface $em)
    {     

        $donneeRecu = json_decode($request->getContent());
        $status = $donneeRecu->isActive;
        // dd($status); ok
        $user=$userRepos->find($id)   ; 
        $idpartenaire = $user->getPartenaire();
        // dd($idpartenaire);   ok

        // recherche users partenaire
        $usersPartenaire = $userRepos->findBy(array('partenaire'=> $idpartenaire)) ;
        // dd($usersPartenaire);    ok

        //blocage des users partenaire
        foreach($usersPartenaire as $users) {
            $users->setIsActive($status);
            $em->flush();
        }   

        if($status===false){
            $data= [
                "status" => 201,
                "message" => " Vous venez de bloquer le partenaire"];
            return $this->json($data, 201);
        }
        if($status===true){
            $data= [
                "status" => 201,
                "message" => " Vous venez de debloquer le partenaire"];
            return $this->json($data, 201);
        }
            
    }

}

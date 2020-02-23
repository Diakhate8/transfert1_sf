<?php

namespace App\Controller\Service;

use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/api")
 */
class RapportController extends AbstractController
{
    /**
     * @Route("/rapport", name="rapport", methods={"get"})
     */
    public function showTransaction(TransactionRepository $transactRepo)
    {
        return $this->json($transactRepo->findAll(), 200, [],['groups'=> "post:read", "post:write"]);
 
    }

    /**
     * @Route("/rapportpartenaire", name="rapportpartenaire", methods={"get"})
     */
    public function showTransactionP(Request $request, TransactionRepository $transactRepo)
    { 
        // $userOnline = $this->getUser();
        // $donneeRecu = json_decode($request->getContent());
        // $value = $donneeRecu->idCompte;
        // $date = $donneeRecu->date ;
        $value = 1;
        $date = "2020-02-14 08:59:19";
        // return $this->json($transactRepo->findAll(), 200, [],['groups'=> "post:write"]);
        $rapport = $transactRepo->findByParttenaireDate($value, $date);
        return $this->json($rapport, 200, [],['groups'=> "post:read", "post:write"]);
   }


}

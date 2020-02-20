<?php

namespace App\Controller\Service;

use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


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
    public function showTransactionP(TransactionRepository $transactRepo)
    {
        return $this->json($transactRepo->findAll(), 200, [],['groups'=> "post:write"]);
 
    }
}

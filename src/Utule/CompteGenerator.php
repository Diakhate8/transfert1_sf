<?php
namespace App\Utule;

use App\Entity\Compte;
use App\Repository\CompteRepository;

class CompteGenerator{
    private $nbCompte ;
   
    public function __construct(CompteRepository $compteRepo){
       
        // on recupere l'id dans l'ordre decroissant
         $lastcompte=$compteRepo->findOneBy([],['id'=>'desc']);
         if($lastcompte != null){
             $lastid = $lastcompte->getId();
             
              $this->nbCompte = sprintf("%'.05d", $lastid+1);         
 
         }else{
             //commencer au debut enlever un 0 et le remplacer par 1
             $this->nbCompte = sprintf("%'.05d",1);
         }
         //var_dump($this->nbCompte);die();
    }
    public function generateNumbCompte(){
  
        return $this->nbCompte ;
    }
}

?>
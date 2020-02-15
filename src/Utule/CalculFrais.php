<?php
namespace App\Utule;


class CalculFrais{

    private $frais ;
    public function __construct($frais){ 
        $this->frais = $frais;
    }

    public function GenereFrais($solde,$frais){
        $frais=0;
        switch($solde){
            case ($solde<=495):
                $frais = 25;
            break;
            case ($solde>495 && $solde<=1100):
                $frais = 90;
            break;
            case ($solde>1100 && $solde<=3000):
                $frais = 180;
            break;
            case ($solde>3000 && $solde<=5000):
                $frais = 350;
            break;
            case ($solde>5000 && $solde<=10000):
                $frais = 500;
            break;
            case ($solde>10000 && $solde<=15000):
                $frais = 700;
            break;
            case ($solde<=15000 && $solde<=20000):
                $frais = 900;
            break;
            case ($solde>20000 && $solde<=35000):
                $frais = 1400;
            break;
            case ($solde>35000 && $solde<=60000):
                $frais = 1700;
            break;
            case ($solde>60000 && $solde<=10000):
                $frais = 2600;
            break;
            case ($solde>100000 && $solde<=175000):
                $frais = 3500;
            break;
            case ($solde>175000 && $solde<=200000):
                $frais = 4500;
            break;
            default:
                $frais = 0;
            break;
        }
        return $this->frais ;

    }
    
}

?>
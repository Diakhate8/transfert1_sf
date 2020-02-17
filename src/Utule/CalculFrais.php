<?php
namespace App\Utule;


class CalculFrais{

    function genereFrais($solde){

        switch($solde){
            case ($solde<=495):
                $solde = 25;
            break;
            case ($solde>495 && $solde<=1100):
                $solde = 90;
            break;
            case ($solde>1100 && $solde<=3000):
                $solde = 180;
            break;
            case ($solde>3000 && $solde<=5000):
                $solde = 350;
            break;
            case ($solde>5000 && $solde<=10000):
                $solde = 500;
            break;
            case ($solde>10000 && $solde<=15000):
                $solde = 700;
            break;
            case ($solde<=15000 && $solde<=20000):
                $solde = 900;
            break;
            case ($solde>20000 && $solde<=35000):
                $solde = 1400;
            break;
            case ($solde>35000 && $solde<=60000):
                $solde = 1700;
            break;
            case ($solde>60000 && $solde<=10000):
                $solde = 2600;
            break;
            case ($solde>100000 && $solde<=175000):
                $solde = 3500;
            break;
            case ($solde>175000 && $solde<=200000):
                $solde = 4500;
            break;
            default:
                $solde = 0;
            break;
        }
        return $solde ;

    }
   
    
}

?>
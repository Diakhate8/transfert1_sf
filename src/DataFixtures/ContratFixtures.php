<?php

namespace App\DataFixtures;

use App\Entity\Contrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ContratFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contrat = new Contrat();
$contrat->setIntitule(" Contrat:Entre les soussignés:\r\n patenaire et \r\n  ci-après dénommé le partenariat:Les Comptes du Partenaires\r\n 
  il a été arrêté et convenu ce qui suit :\';\r\n  ");

$contrat->setArticleA( " Article 1 : Engagement Le partenariat a demare à compter du jour .
Le partenaire déclare être, à compter de la date effective de partenariat, 
    libre de tout engagement de nature à faire obstacle à l’exécution du présent contrat.\r\n\r\n "); 

$contrat->setArticleB(" Article 2: Fonctions et attributions\r\n        
Le partenaire est engagé en qualité d’utiliser notre plateforme pour créer des comptes et effectuer des transactions 
 sur ses comptes.\r\n\r\n ");

$contrat->setArticleC("Article 3 : Lieu de travail\r\n       
 Le partenaire exercera ses fonctions dans les locaux qui lui convient\r\n " );

$contrat->setArticleD(" Article 4 : 
En contrepartie, le partenaire percevra une rémunération sur commission pour chaque transaction effectuée\r\n            
commission Envoi = (frais de transfert X 10)/100\r\n     
commission Retrait = (frais de transfert X 20)/100\r\n\r\n  " );

$contrat->setArticleE("Article 5 : Préavis\r\n          
        Chacune des parties a la possibilité de rompre le présent contrat dans les conditions prévues par la loi,
        sous réserve de respecter le préavis de \r\n            
         Diakhate pour le blocage et l’annulation\r\n        
         Signatures = \'Fait en double exemplaire a Dakar, le .\r\n   
        Signature à faire précéder de la mention manuscrite lu et approuvé\r\n          
        Directeur Général de BeeDigital      \t Le partenaire."
    );
        $manager->persist($contrat);

        $manager->flush();
    }
}

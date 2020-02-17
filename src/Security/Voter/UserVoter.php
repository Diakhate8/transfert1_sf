<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class UserVoter extends Voter implements VoterInterface
{
        // these strings are just invented: you can use anything
        const ADMIN_SYS = "ROLE_ADMIN_SYSTEM" ;
        const ADMIN = "ROLE_ADMIN" ;
        const CAISSIER = "ROLE_CAISSIER" ;
        const PARTENAIRE = "ROLE_PARTENAIRE" ;
        const CAISSIER_PARTENAIRE = "ROLE_CAISSIER_PARTENAIRE" ;
        const ADMIN_PARTENAIRE = "ROLE_ADMIN_PARTENAIRE" ;
       

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['CAN_POST', 'CAN_VIEW'])
            && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $userOnLine = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$userOnLine instanceof UserInterface) {
            // throw new Exception("Vous n'etes pas un utulisateur");
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
            //My conditions
        if($userOnLine->getRoles()[0]===self::ADMIN_SYS && $subject->getRoles()[0] !== self::ADMIN_SYS ){ //dd( $subject->getRoles()[0])
            return true;

        }
        switch ($attribute) {
            case 'CAN_POST':
                // logic to determine if the user can POST
                // return true or false
                if($userOnLine->getRoles()[0]=== self::ADMIN_SYS && 
                $subject->getRoles()[0] !== self::ADMIN_SYS ){
                    return true;
                } 
                elseif($userOnLine->getRoles()[0]===self::ADMIN && 
                ($subject->getRoles()[0] === self::CAISSIER || 
                $subject->getRoles()[0] === self::PARTENAIRE)){
                    return true;
                }elseif($userOnLine->getRoles()[0]===self::PARTENAIRE  && 
                ($subject->getRoles()[0] === self::CAISSIER_PARTENAIRE || 
                $subject->getRoles()[0] === self::ADMIN_PARTENAIRE)){
                    return true;
                }elseif($userOnLine->getRoles()[0]===self::CAISSIER_PARTENAIRE){
                    return false;
                }elseif($userOnLine->getRoles()[0]=== self::ADMIN_PARTENAIRE && 
                $subject->getRoles()[0] !== self::CAISSIER_PARTENAIRE ){
                    return true;
                }else{
                    return false;
                }
                          
                // return true or false
                break;
            case 'CAN_VIEW':

                break;   
            default :
                break;
        }

        return false;
    }
}
   
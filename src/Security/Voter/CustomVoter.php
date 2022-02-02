<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class CustomVoter extends Voter
{
    /**
     * est ce que le voter doit etre applique
     *
     * @param string $attribute de permission
     * @param [type] $subject  l'Obj passe
     * @return boolean
     */
    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, ['USER_CREATE'])
            && $subject instanceof \App\Entity\User;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        // Role client et ressource owner
        switch ($attribute) {
            case 'USER_CREATE':
                return true;
                break;

        }

        return false;
    }
}

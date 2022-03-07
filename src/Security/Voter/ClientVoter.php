<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Entity\Client;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

/**
 * systeme de gestion d'authentification
 * Entite Client et User
 */
class ClientVoter extends Voter
{
    public const DELETE = 'DELETE_CLIENT';
    public const CREATE = 'CREATE_CLIENT_USER';
    
    private Security $security;
    private Client $user;

    // Security -> Permissions utilisateurs. (ROLES)
    public function __construct(Security $security)
    {
        $this->security = $security;
    }   


    /**
     * Supported?
     *
     * @param string $attribute
     * @param [type] $subject c l'entite
     * @return boolean
     */
    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, ['DELETE_CLIENT', 'CREATE_CLIENT_USER'])
            && $subject instanceof \App\Entity\Client;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        //Qui est connecté?(token saisie)
        $user = $token->getUser();
        $this->user = $user;

        
        //Checking - Full acces Admin/Connecte/Proprietaire?
        //Proprietaire (fk) qui lie les 2 entites.
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        if (!$user instanceof UserInterface) {
            return false;
        }       
        
        if (null === $subject->getUsers()) { //check fk relation.(Proprietaire)
            return false;
        }


        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::DELETE:
                //Si le client est linke(fk) à l'user.
                return $this->clientCanDelete($subject);
                break;            
            case self::CREATE:
                //Si le client est linke(fk) à l'user.
                return $this->userCanCreate($subject, $user);
                break;
        }

        return false;
    }

    /**
     * Verifier la correspondance username (email).
     * $subject(entity)
     * @return void
     */
    private function clientCanDelete(Client $client)
    {
        //user connecte = client{id} a supprimer.
        return $this->user->getUserIdentifier() === $client->getUserIdentifier();
    }

    /**
     * Verifie la relation fk Client <> User
     *
     * @return void
     */
    private function userCanCreate(Client $client)
    {
        return $this->user->getUserIdentifier() === $client->getUserIdentifier();
    }
}



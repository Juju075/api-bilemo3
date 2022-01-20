<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use symfony\Component\Validator as Assert;

//"access_control"="is_granted('ROLE_ADMIN')"
// "put"={"denormalization_context"={"client_detail_write"}}, "patch", "delete"}

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\HasLifecycleCallbacks
 * @ApiResource(
 *  collectionOperations={"get"={"normalization_context"={"client_read"}}, "post"={"denormalization_context"={"client_write"}}},
 *  itemOperations={"get"={"normalization_context"={"client_detail_read"}}, 
 *   "put"={"denormalization_context"={"client_detail_write"}}, "patch", "delete"}
 * )
 */
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    use Timestampable;  
    use Ressourceid;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"client_read"}, {"client_detail_read"}, {"client_write"}, {"client_detail_write"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"client_read"}, {"client_detail_read"}, {"client_write"}, {"client_detail_write"})
     */
    private $roles = [];

    /**
     * @var string 
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}

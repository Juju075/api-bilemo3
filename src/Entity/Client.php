<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiProperty;

use ApiPlatform\Core\Annotation\ApiResource;

use Symfony\Component\Serializer\Annotation\Groups;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;



/**
* @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
* @UniqueEntity(fields={"email"}, message="There is already an account with this email")
* @ORM\HasLifecycleCallbacks
* 
* @ApiResource(
*  collectionOperations={
*  "get"={
*      "normalization_context"={"client_detail_read"},
*      "method"="GET",
*      "path"="/client/{id}/users",
*      "openapi_context"= {"summary"="Retrieves the collection of Client ressource' user", "description"="Type client identifer."},
*  }},
*
*  itemOperations={
*      "User_detail"={
*      "normalization_context"={"client_detail_read"},
*      "method"="GET",
*      "path"="/client/{id}/user/{user_id}",
*      "openapi_context"= {"summary"="Display details on specific Client' user", "description"="2 parameters are required to perform this request."},
*  },
*  "Add_User"={
*      "denormalization_context"={"client_write"},
*      "method"="POST",
*      "path"="/client/{id}/user",
*      "controller"="CreateUserController::class",
*      "openapi_context"= {"summary"="Add a new User to a specific Client", "description"="Choice the Client identifer which add a new User."},
*  }, 
*  "delete"={
*      "method"="DELETE",
*      "path"="/client/{id}/users",
*      "openapi_context"= {"summary"="Delete a specific Client ressource", "description"="description ici"},
* },
* })
*
*
* @Hateoas\Relation(
*      "self",
*      href = @Hateoas\Route(
*          "api_clients_get_collection",
*      parameters = { "id" = "expr(object.getId())" },
*      absolute = true
*      )
* ) 
* 
* @Hateoas\Relation("self", href = "expr('/api/client/' ~ object.getId())")
* 
* Afficher la liste des user   
* .0 
* 
*  - Afficher le detail d'un useur 
* 

* 
* @Hateoas\Relation(
*      "Get all users releated to a specific client",
*         href = @Hateoas\Route(
*          "api_clients_get_collection",
*          parameters = { "id" = "expr(object.getId())" },
*          absolute = true
*      )
* ) 
* 
* @Hateoas\Relation(
*      "Add new user to a specific client",
*      href = @Hateoas\Route(
*          "api_clients_Add_User_item",
*          parameters = { "id" = "expr(object.getId())" },
*          absolute = true
*      )
* ) 
*/
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    /** @Serializer\XmlAttribute */
    
    use Timestampable;  
    use Ressourceid;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"client_read"}, {"client_detail_read"}, {"client_write"}, {"client_detail_write"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Serializer\Groups({"client_read"}, {"client_detail_read"}, {"client_write"}, {"client_detail_write"})
     */
    private $roles = [];

    /**
     * @var string 
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="client", orphanRemoval=true)
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setClient($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClient() === $this) {
                $user->setClient(null);
            }
        }

        return $this;
    }
}


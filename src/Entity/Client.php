<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

 
use App\Entity\Traits\Timestampable;

use ApiPlatform\Core\Annotation\ApiResource;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\Groups;

/**
* @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
* @UniqueEntity(fields={"email"}, message="There is already an account with this email")
* @ORM\HasLifecycleCallbacks
* 
* @ApiResource(
*  collectionOperations={
*  "get"={
*      "normalization_context"={"client_collection_read"},
*      "method"="GET",
*      "path"="/client/{id}/users",
*      "controller"="GetUsersCollectionController.php::class", 
*      "openapi_context"= {"summary"="Retrieves the collection of Client ressource' user", "description"="Type client identifer."},
*  }},
*
*  itemOperations={
*   "get"={
*      "method"="GET",
*      "path"="/client/{id}/user/{user_id}",
*      "controller"="GetUserClientController.php::class",
*      "openapi_context"= {"summary"="Display details on specific Client' user", "description"="2 parameters are required to perform this request."},
*  },
*  "post"={
*      "method"="POST",
*      "path"="/client/{id}/user",
*      "controller"="CreateUserController::class",
*      "openapi_context"= {"summary"="Add a new User to a specific Client", "description"="Choice the Client identifer which add a new User."},
*  }, 
*  "delete"={
*      "method"="DELETE",
*      "path"="/client/{id}/users",
*      "controller"="DeleteClientController::class", 
*      "openapi_context"= {"summary"="Delete a specific Client ressource", "description"="description ici"},
* },
* })
*/
class Client implements UserInterface, PasswordAuthenticatedUserInterface
{
    
    use Timestampable;  

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"client_collection_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"client_collection_read"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
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


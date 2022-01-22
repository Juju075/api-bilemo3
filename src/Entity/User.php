<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;
use Symfony\Component\Serializer\Annotation\Groups;
use symfony\Component\Validator as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    use Timestampable;  
    use Ressourceid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Userproduct::class, inversedBy="user")
     */
    private $userproduct;


    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getUserproduct(): ?Userproduct
    {
        return $this->userproduct;
    }

    public function setUserproduct(?Userproduct $userproduct): self
    {
        $this->userproduct = $userproduct;

        return $this;
    }
}

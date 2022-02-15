<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"prenom","nom"}, message="There is already an account with this fullname")
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
     * @ORM\ManyToMany(targetEntity=Produit::class)
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


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

    public function getFullName(): string
    {
        return $this->getPrenom() . $this->getNom();
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProducts(): ?Collection
    {
        return $this->products;
    }

    public function addProduct(Produit $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Produit $product): self
    {
        $this->products->removeElement($product);

        return $this;
    }
}


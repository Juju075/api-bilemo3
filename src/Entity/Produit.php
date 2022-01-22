<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks
 * @ApiResource(
 *  collectionOperations={
 * "get"={
 * "normalization_context"={"produit_read"},
 *      "method"="GET",
 *      "path"="/collection/produits"
 * },
 * "post"
 * },
 *  itemOperations={
 * "get"={
 * "normalization_context"={"produit_detail_read"},
 *      "method"="GET",
 *      "path"="/produit/{id}"
 * }, 
 *  "post"={
 *      "method"="POST",
 *      "path"="/produit/create",
 *      "controller"="CreateProduit::class",
 *  }}
 * )
 */
class Produit
{
    use Timestampable;  
    use Ressourceid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 3, max = 50)
     * @Assert\Unique
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Unique
     * @Assert\Length(min = 3, max = 20)
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 3, max = 400)
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Userproduct::class, mappedBy="produit")
     */
    private $userproducts;

    public function __construct()
    {
        $this->userproducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Userproduct[]
     */
    public function getUserproducts(): Collection
    {
        return $this->userproducts;
    }

    public function addUserproduct(Userproduct $userproduct): self
    {
        if (!$this->userproducts->contains($userproduct)) {
            $this->userproducts[] = $userproduct;
            $userproduct->setProduit($this);
        }

        return $this;
    }

    public function removeUserproduct(Userproduct $userproduct): self
    {
        if ($this->userproducts->removeElement($userproduct)) {
            // set the owning side to null (unless already changed)
            if ($userproduct->getProduit() === $this) {
                $userproduct->setProduit(null);
            }
        }

        return $this;
    }
}

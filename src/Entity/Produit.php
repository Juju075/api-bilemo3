<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Ressourceid;
use App\Entity\Traits\Timestampable;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

// "put", "patch", "delete"}

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks
 * @ApiResource(
 *  collectionOperations={"get"={"normalization_context"={"produit_read"}}, "post"},
 *  itemOperations={"get"={"normalization_context"={"produit_detail_read"}}, 
 *  "put"={
 *      "method"="PUT",
 *      "path"="/produits/create",
 *      "controller"="CreateProduit::class",
 *  }, 
 *  "patch"={
 *      "method"="PATCH",
 *      "path"="/produits/update/{id}",
 *      "controller"="UpdateProduit::class",
 * },
 *  "delete"={
 *      "method"="DELETE",
 *      "path"="/produits/delete/{id}",
 *      "controller"="DeleteProduit::class",
 * }}
 * )
 */
class Produit
{
    use Timestampable;  
    use Ressourceid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Groups({"produit_read"}, {"produit_detail_read"})
     */
    private $price;

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
}

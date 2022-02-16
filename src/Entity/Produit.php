<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Traits\Timestampable;
use JMS\Serializer\Annotation as Serializer;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @ORM\HasLifecycleCallbacks
 * 
 * @ApiResource(
 *  collectionOperations={
 * "get"={
 * "normalization_context"={"produit_read"},
 *      "method"="GET",
 *      "path"="/collection/produits",
 *      "openapi_context"= {"summary"="Display all products", "description"="Any parameters are required to perform this action."},
 * }},
 *  itemOperations={
 * "get"={
 * "normalization_context"={"produit_detail_read"},
 *      "method"="GET",
 *      "path"="/produit/{id}",        
 *      "openapi_context"= {"summary"="Display specific product detail", "description"="description ici"},
 * },})
 */
class Produit
{
    use Timestampable;  //Ne pas afficher en lecture

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
    * @ORM\Column(type="string", length=255)
    * @Assert\Length(min = 3, max = 50)
    * @Assert\Unique
    * @ApiProperty(
    *     openapiContext={"required"=true, "minLength"=4, "example"="some example text"})
    */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Unique
     * @Assert\Length(min = 3, max = 20)
     */
    private $model; 

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 3, max = 400)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
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

    public function getPrice():? string
    {
        return $this->price." "."euros";
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}


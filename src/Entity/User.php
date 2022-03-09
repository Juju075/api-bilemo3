<?php
declare(strict_types = 1); 
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;
use App\Entity\Traits\Timestampable;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation\Groups;
use Pagerfanta\Pagerfanta;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"prenom","nom"}, message="There is already an account with this fullname")
 */
class User
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
     * @ORM\Column(type="string", length=255)
     * @Groups({"client_collection_read"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"client_collection_read"})
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * indique au serializer ce que contient $meta.
     * @Type("array<App\Entity\User>")
     */
    public $data; 
    public $meta;

    /**
     * Call by getUsers() - GetUsersCollectionController.php
     * bloquer ce suivi.
     * @ORM\ManyToMany(targetEntity=Produit::class)
     * @Groups({"users_collection_read"})
     */
    private $products;

    public function __construct(Pagerfanta $data)
    {
        $this->products = new ArrayCollection();

        $this->data = $data;
        
        $this->addMeta('limit', $data->getMaxPerPage());
        //$this->addMeta('current_items', count($data->getCurrentPageResults()));
        $this->addMeta('total_items', $data->getNbResults());
        $this->addMeta('offset', $data->getCurrentPageOffsetStart());       
    }


    public function getId(): ?int
    {
        return $this->id;
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

    //Ajout d'une metadonnee.
    public function addMeta($name, $value)
    {
        if (isset($this->meta[$name])) {
            throw new \LogicException(sprintf('This meta already exists. You are trying to override this meta, use the setMeta method instead for the %s meta.', $name));
        }
        
        $this->setMeta($name, $value);
    }

    //Setter
    public function setMeta($name, $value)
    {
        $this->meta[$name] = $value;
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


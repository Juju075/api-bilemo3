<?php
declare(strict_types = 1);
namespace App\Entity\Traits;

    trait Timestampable
    {
        /**
         * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
         */
        private $createdAt;
    
        /**
         * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
         */
        private $updatedAt;



        /**
         * Undocumented function
         *@Groups({"client_read"}, {"client_detail_read"}, {"produit_read"}, {"produit_detail_read"})
         * @return \DateTimeInterface|null
         */
        public function getCreatedAt(): ?\DateTimeInterface
        {
            return $this->createdAt;
        }
    
        public function setCreatedAt(\DateTimeInterface $createdAt): self
        {
            $this->createdAt = $createdAt;
    
            return $this;
        }
    
        public function getUpdatedAt(): ?\DateTimeInterface
        {
            return $this->updatedAt;
        }
    
        public function setUpdatedAt(\DateTimeInterface $updatedAt): self
        {
            $this->updatedAt = $updatedAt;
    
            return $this;
        }
    

        /**
         * @ORM\PrePersist
         * @ORM\PreUpdate
         */
        public function updateTimestamps()
        {
            if ($this->getCreatedAt() === null) {

            $this->setCreatedAt(new \DateTimeImmutable);
            }
            
            $this->setUpdatedAt(new \DateTimeImmutable);
        }

    }


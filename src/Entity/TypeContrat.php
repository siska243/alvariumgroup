<?php

namespace App\Entity;

use App\Repository\TypeContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=TypeContratRepository::class)
 */
class TypeContrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $title = null;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private ?string $color = null;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private ?string $description = null;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $createdAt = null;

    /**
     * @ORM\OneToMany(mappedBy="typeContrat", targetEntity=OffreEmploi::class)
     */
    private Collection $offreEmplois;

    public function __construct()
    {
        $this->offreEmplois = new ArrayCollection();
        $this->setCreatedAt(new \DateTime('now'));
    }

    public function __toString()
    {
        return $this->title;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, OffreEmploi>
     */
    public function getOffreEmplois(): Collection
    {
        return $this->offreEmplois;
    }

    public function addOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if (!$this->offreEmplois->contains($offreEmploi)) {
            $this->offreEmplois->add($offreEmploi);
            $offreEmploi->setTypeContrat($this);
        }

        return $this;
    }

    public function removeOffreEmploi(OffreEmploi $offreEmploi): static
    {
        if ($this->offreEmplois->removeElement($offreEmploi)) {
            // set the owning side to null (unless already changed)
            if ($offreEmploi->getTypeContrat() === $this) {
                $offreEmploi->setTypeContrat(null);
            }
        }

        return $this;
    }
}

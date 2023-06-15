<?php

namespace App\Entity;

use App\Repository\OffreEmploiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreEmploiRepository::class)
 */
class OffreEmploi
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
     * @ORM\Column(type="text")
     */
    private ?string $description = null;

  
    /**
     * @ORM\Column(type="float",nullable="true")
     */
    private ?float $salaire = null;


    /**
     * @ORM\ManyToOne(targetEntity=TypeContrat::class, inversedBy="offreEmplois")
     */
    private ?TypeContrat $typeContrat = null;

    /**
     * @ORM\ManyToOne(targetEntity=Domaine::class, inversedBy="offreEmplois")
     */
    private ?Domaine $domaine = null;



    /**
     * @ORM\Column(type="datetime",nullable="true")
     */
    private ?\DateTime $deletedAt = null;

    /**
     * @ORM\Column(type="datetime",nullable="true")
     */
    private ?\DateTime $updatedAt = null;

    /**
     * @ORM\Column(type="datetime",nullable="true")
     */
    private ?\DateTime $closedAt = null;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $isPublish = true;

    /**
     * @ORM\Column(type="datetime",nullable="true")
     */
    private ?\DateTime $isPublishAt = null;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offreEmplois")
     */
    private ?User $createdBy = null;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="offreEmplois")
     */
    private ?Ville $ville = null;


    /**
     * @ORM\Column(type="text")
     */
    private ?string $slug = null;

    public function __construct()
    {
        $this->setIsPublishAt(new \Datetime('now'));
        $this->setClosedAt((new \Datetime('now'))->modify('30days'));
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(?float $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $typeContrat): static
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(?Domaine $domaine): static
    {
        $this->domaine = $domaine;

        return $this;
    }


    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTime $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getClosedAt(): ?\DateTime
    {
        return $this->closedAt;
    }

    public function setClosedAt(\datetime $closedAt): static
    {
        $this->closedAt = $closedAt;

        return $this;
    }

    public function isIsPublish(): ?bool
    {
        return $this->isPublish;
    }

    public function setIsPublish(bool $isPublish): static
    {
        $this->isPublish = $isPublish;

        return $this;
    }

    public function getIsPublishAt(): ?\DateTime
    {
        return $this->isPublishAt;
    }

    public function setIsPublishAt(?\DateTime $isPublishAt): static
    {
        $this->isPublishAt = $isPublishAt;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}

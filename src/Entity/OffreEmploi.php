<?php

namespace App\Entity;

use App\Repository\OffreEmploiRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreEmploiRepository::class)]
class OffreEmploi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float $salaire = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    private ?TypeContrat $typeContrat = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    private ?Domaine $domaine = null;

    #[ORM\Column]
    private array $competences = [];

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $deletedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $closedAt = null;

    #[ORM\Column]
    private ?bool $isPublish = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $isPublishAt = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    private ?User $createdBy = null;

    #[ORM\ManyToOne(inversedBy: 'offreEmplois')]
    private ?Ville $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

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

    public function getCompetences(): array
    {
        return $this->competences;
    }

    public function setCompetences(array $competences): static
    {
        $this->competences = $competences;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeImmutable $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getClosedAt(): ?\DateTimeImmutable
    {
        return $this->closedAt;
    }

    public function setClosedAt(\DateTimeImmutable $closedAt): static
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

    public function getIsPublishAt(): ?\DateTimeImmutable
    {
        return $this->isPublishAt;
    }

    public function setIsPublishAt(?\DateTimeImmutable $isPublishAt): static
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

<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column]
    private ?float $hoursPlayed = null;

    #[ORM\OneToOne(mappedBy: 'game', cascade: ['persist', 'remove'])]
    private ?Review $review = null;

    /**
     * @var Collection<int, Editor>
     */
    #[ORM\ManyToMany(targetEntity: Editor::class, mappedBy: 'games')]
    private Collection $editors;

    /**
     * @var Collection<int, Developper>
     */
    #[ORM\ManyToMany(targetEntity: Developper::class, mappedBy: 'games')]
    private Collection $developpers;

    /**
     * @var Collection<int, Platform>
     */
    #[ORM\ManyToMany(targetEntity: Platform::class, mappedBy: 'games')]
    private Collection $platforms;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'games')]
    private Collection $tags;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    public function __construct()
    {
        $this->editors = new ArrayCollection();
        $this->developpers = new ArrayCollection();
        $this->platforms = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getHoursPlayed(): ?float
    {
        return $this->hoursPlayed;
    }

    public function setHoursPlayed(float $hoursPlayed): static
    {
        $this->hoursPlayed = $hoursPlayed;

        return $this;
    }

    public function getReview(): ?Review
    {
        return $this->review;
    }

    public function setReview(Review $review): static
    {
        // set the owning side of the relation if necessary
        if ($review->getGame() !== $this) {
            $review->setGame($this);
        }

        $this->review = $review;

        return $this;
    }

    /**
     * @return Collection<int, Editor>
     */
    public function getEditors(): Collection
    {
        return $this->editors;
    }

    public function addEditor(Editor $editor): static
    {
        if (!$this->editors->contains($editor)) {
            $this->editors->add($editor);
            $editor->addGame($this);
        }

        return $this;
    }

    public function removeEditor(Editor $editor): static
    {
        if ($this->editors->removeElement($editor)) {
            $editor->removeGame($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Developper>
     */
    public function getDeveloppers(): Collection
    {
        return $this->developpers;
    }

    public function addDevelopper(Developper $developper): static
    {
        if (!$this->developpers->contains($developper)) {
            $this->developpers->add($developper);
            $developper->addGame($this);
        }

        return $this;
    }

    public function removeDevelopper(Developper $developper): static
    {
        if ($this->developpers->removeElement($developper)) {
            $developper->removeGame($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Platform>
     */
    public function getPlatforms(): Collection
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): static
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms->add($platform);
            $platform->addGame($this);
        }

        return $this;
    }

    public function removePlatform(Platform $platform): static
    {
        if ($this->platforms->removeElement($platform)) {
            $platform->removeGame($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->addGame($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeGame($this);
        }

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): static
    {
        $this->path = $path;

        return $this;
    }
}

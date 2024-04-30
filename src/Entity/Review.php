<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $overall = null;

    #[ORM\Column]
    private ?int $gameplay = null;

    #[ORM\Column]
    private ?int $soundtrack = null;

    #[ORM\Column]
    private ?int $visuals = null;

    #[ORM\Column]
    private ?int $story = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\OneToOne(inversedBy: 'review', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOverall(): ?float
    {
        return $this->overall;
    }

    public function setOverall(float $overall): static
    {
        $this->overall = $overall;

        return $this;
    }

    public function getGameplay(): ?int
    {
        return $this->gameplay;
    }

    public function setGameplay(int $gameplay): static
    {
        $this->gameplay = $gameplay;

        return $this;
    }

    public function getSoundtrack(): ?int
    {
        return $this->soundtrack;
    }

    public function setSoundtrack(int $soundtrack): static
    {
        $this->soundtrack = $soundtrack;

        return $this;
    }

    public function getVisuals(): ?int
    {
        return $this->visuals;
    }

    public function setVisuals(int $visuals): static
    {
        $this->visuals = $visuals;

        return $this;
    }

    public function getStory(): ?int
    {
        return $this->story;
    }

    public function setStory(int $story): static
    {
        $this->story = $story;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(Game $game): static
    {
        $this->game = $game;

        return $this;
    }
}

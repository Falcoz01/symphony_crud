<?php

namespace App\Entity;

use App\Repository\FlourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlourRepository::class)]
class Flour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Type = null;

    #[ORM\Column]
    private ?int $Rate = null;

    #[ORM\Column(length: 255)]
    private ?string $Usage = null;

    #[ORM\Column]
    private ?int $Stock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->Rate;
    }

    public function setRate(int $Rate): static
    {
        $this->Rate = $Rate;

        return $this;
    }

    public function getUsage(): ?string
    {
        return $this->Usage;
    }

    public function setUsage(string $Usage): static
    {
        $this->Usage = $Usage;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(int $Stock): static
    {
        $this->Stock = $Stock;

        return $this;
    }
}

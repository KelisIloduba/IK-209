<?php

namespace App\Entity;

use App\Repository\InformationsConnexions3Repository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationsConnexions3Repository::class)]
class InformationsConnexions3
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $login = null;

    #[ORM\Column(length: 255)]
    private ?string $motdePasse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getMotdePasse(): ?string
    {
        return $this->motdePasse;
    }

    public function setMotdePasse(string $motdePasse): static
    {
        $this->motdePasse = $motdePasse;

        return $this;
    }
}

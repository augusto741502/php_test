<?php

namespace App\Entity;

use App\Repository\HorarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorarioRepository::class)]
class Horario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $instalacion = null;

    #[ORM\Column(length: 255)]
    private ?string $inicio = null;

    #[ORM\Column(length: 255)]
    private ?string $retiro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getInstalacion(): ?string
    {
        return $this->instalacion;
    }

    public function setInstalacion(string $instalacion): static
    {
        $this->instalacion = $instalacion;

        return $this;
    }

    public function getInicio(): ?string
    {
        return $this->inicio;
    }

    public function setInicio(string $inicio): static
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getRetiro(): ?string
    {
        return $this->retiro;
    }

    public function setRetiro(string $retiro): static
    {
        $this->retiro = $retiro;

        return $this;
    }
}

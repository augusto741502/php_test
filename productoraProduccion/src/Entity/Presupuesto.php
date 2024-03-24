<?php

namespace App\Entity;

use App\Repository\PresupuestoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresupuestoRepository::class)]
class Presupuesto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fecha = null;

    #[ORM\Column]
    private ?int $n_presupuesto = null;

    #[ORM\Column(length: 255)]
    private ?string $cliente = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $fono = null;

    #[ORM\Column]
    private ?int $total = null;

    #[ORM\Column]
    private ?int $estado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNpresupuesto(): ?int
    {
        return $this->n_presupuesto;
    }

    public function setNpresupuesto(int $n_presupuesto): static
    {
        $this->n_presupuesto = $n_presupuesto;

        return $this;
    }

    public function getCliente(): ?string
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente): static
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFono(): ?string
    {
        return $this->fono;
    }

    public function setFono(string $fono): static
    {
        $this->fono = $fono;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): static
    {
        $this->estado = $estado;

        return $this;
    }
}

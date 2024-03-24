<?php

namespace App\Entity;

use App\Repository\PresupuestoServicioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresupuestoServicioRepository::class)]
class PresupuestoServicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_presupuesto = null;

    #[ORM\Column(length: 255)]
    private ?string $servicio = null;

    #[ORM\Column(nullable: true)]
    private ?int $valor = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

    #[ORM\Column(nullable: true)]
    private ?int $subtotal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdPresupuesto(): ?int
    {
        return $this->id_presupuesto;
    }

    public function setIdPresupuesto(int $id_presupuesto): static
    {
        $this->id_presupuesto = $id_presupuesto;

        return $this;
    }

    public function getServicio(): ?string
    {
        return $this->servicio;
    }

    public function setServicio(string $servicio): static
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function setValor(?int $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    public function setSubtotal(?int $subtotal): static
    {
        $this->subtotal = $subtotal;

        return $this;
    }
}

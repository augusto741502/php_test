<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reserva = null;

    #[ORM\Column]
    private ?int $id_cliente = null;

    #[ORM\Column]
    private ?int $id_horario = null;

    #[ORM\Column(length: 255)]
    private ?string $ids_servicio = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getReserva(): ?string
    {
        return $this->reserva;
    }

    public function setReserva(string $reserva): static
    {
        $this->reserva = $reserva;

        return $this;
    }

    public function getIdCliente(): ?int
    {
        return $this->id_cliente;
    }

    public function setIdCliente(int $id_cliente): static
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getIdHorario(): ?int
    {
        return $this->id_horario;
    }

    public function setIdHorario(int $id_horario): static
    {
        $this->id_horario = $id_horario;

        return $this;
    }


    public function getIdsServicio(): ?string
    {
        return $this->ids_servicio;
    }

    public function setIdsServicio(string $ids_servicio): static
    {
        $this->ids_servicio = $ids_servicio;

        return $this;
    }
}

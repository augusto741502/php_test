<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fecha = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $correo = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $valor = null;

    #[ORM\Column]
    private ?int $estado = null;

    #[ORM\Column]
    private ?int $iva = null;

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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): static
    {
        $this->correo = $correo;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): static
    {
        $this->valor = $valor;

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

    public function getIva(): ?int
    {
        return $this->iva;
    }

    public function setIva(int $iva): static
    {
        $this->iva = $iva;

        return $this;
    }
}

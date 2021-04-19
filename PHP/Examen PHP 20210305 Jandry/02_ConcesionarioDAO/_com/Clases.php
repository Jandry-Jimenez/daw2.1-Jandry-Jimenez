<?php

abstract class Dato
{
}

trait Identificable
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}

class Coche extends Dato 
{
    use Identificable;

    private string $nombre;
    private ?array $cochesPertenecientes;

    public function __construct(int $id, string $matricula,string $modelo,int $precio)
    {
        $this->setId($id);
        $this->setMatricula($matricula);
        $this->setModelo($modelo);
        $this->setPrecio($precio);
    }

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "matricula" => $this->getMatricula,
            "modelo" => $this->getModelo,
            "precio" => $this->getPrecio,
        ];
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula)
    {
        $this->matricula = $matricula;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo)
    {
        $this->modelo = $modelo;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function setPrecio(string $precio)
    {
        $this->precio = $precio;
    }
}
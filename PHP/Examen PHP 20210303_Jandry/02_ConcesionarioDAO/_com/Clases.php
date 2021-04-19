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

class coche extends Dato
{
    use Identificable;

    private string $matricula;
    private array $cochePertenecientes;

    public function __construct(int $id, string $matricula)
    {
        $this->setId($id);
        $this->setMatricula($matricula);
    }

    public function getNombre(): string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula)
    {
        $this->matricula = $matricula;
    }

    public function obtenerCochesPertenecientes(): array
    {
        if ($this->cochePertenecientes == null) $cochePertenecientes = DAO::cocheObtenerPorCoche($this->id);

        return $cochePertenecientes;
    }
}

class Persona extends Dato
{
    use Identificable;

    private string $matricula;
    private string $modelo;
    // ...
    private int $cocheId;
    private coche $coche;

    public function obtenerCategoria(): coche
    {
        if ($this->coche == null) $coche = DAO::categoriaObtenerPorId($this->cocheId);

        return $coche;
    }
}
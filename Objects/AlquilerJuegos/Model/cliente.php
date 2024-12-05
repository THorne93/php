<?php

class Cliente {

    private $dni;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $localidad;
    private $clave;
    private $tipo;

    public function __construct($d,$n,$a,$di,$l,$c,$t="cliente") {
     $this->dni=$d;
     $this->nombre=$n;
     $this->apellidos=$a;
     $this->direccion=$di;
     $this->localidad=$l;
     $this->clave=$c;
     $this->tipo=$t;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }
    public function __toString(): string {
        return "Cliente[dni=" . $this->dni
                . ", nombre=" . $this->nombre
                . ", apellidos=" . $this->apellidos
                . ", direccion=" . $this->direccion
                . ", localidad=" . $this->localidad
                . ", clave=" . $this->clave
                . ", tipo=" . $this->tipo
                . "]";
    }


}

?>
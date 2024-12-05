<?php

class Alquiler {

    private $id;
    private $idJuego;
    private $dniCliente;
    private $fechaAlquiler;
    private $fechaDevol;

    public function __construct($i, $iJ, $d, $fA, $fD) {
        $this->id = $i;
        $this->idJuego = $iJ;
        $this->dniCliente = $d;
        $this->fechaAlquiler = $fA;
        $this->fechaDevol = $fD;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "Cliente[id=" . $this->id
                . ", idJuego=" . $this->idJuego
                . ", dniCliente=" . $this->dniCliente
                . ", fechaAlquiler=" . $this->fechaAlquiler
                . ", fechaDevol=" . $this->fechaDevol
                . "]";
    }
}

?>
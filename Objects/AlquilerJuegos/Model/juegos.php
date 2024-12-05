<?php

class Juego {

    private $codigo;
    private $nombreJuego;
    private $nombreConsola;
    private $anno;
    private $precio;
    private $alquilado;
    private $imagen;
    private $descripcion;

    public function __construct($c, $nJ, $nC, $ano, $p, $a = "no", $i, $d) {
        $this->codigo = $c;
        $this->nombreJuego = $nJ;
        $this->nombreConsola = $nC;
        $this->anno = $ano;
        $this->precio = $p;
        $this->alquilado = $a;
        $this->imagen = $i;
        $this->descripcion = $d;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function __toString(): string {
        return "Juego[codigo=" . $this->codigo
                . ", nombreJuego=" . $this->nombreJuego
                . ", nombreConsola=" . $this->nombreConsola
                . ", anno=" . $this->anno
                . ", alquilado=" . $this->alquilado
                . ", imagen=" . $this->imagen
                . ", descripcion=" . $this->descripcion
                . "]";
    }
}

?>
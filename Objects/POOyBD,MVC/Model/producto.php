<?php


class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($cod, $nom = "", $prec = 0) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $prec;
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }

    public function nuevoProducto($cod, $nom, $prec) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $prec;
    }

    public function __toString(): string {
        return "Codigo= " . $this->codigo
                . ", nombre= " . $this->nombre
                . ", precio= " . $this->precio;
    }
}

?>
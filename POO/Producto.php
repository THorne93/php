<?php

require_once './Conexion.php';

class Producto {

    private $codigo;
    private $nombre;
    private $precio;

    public function __construct($cod = "", $nom = "", $prec = 0) {
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

    public function insertar() {
        try {
            $conex = new Conexion();
            $conex->query("insert into producto (codigo,nombre,precio) values ('$this->codigo','$this->nombre',$this->precio)");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from producto");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $productos[] = new self($fila->codigo, $fila->nombre, $fila->precio);
                }
            } else {
                $productos = false;
            }
            $conex->close();
            return $productos;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from producto where codigo = '$value'");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $p = new self($fila->codigo, $fila->nombre, $fila->precio);
            } else {
                $p = false;
            }
            $conex->close();
            return $p;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
}

?>
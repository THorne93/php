<?php
require_once '../Controller/Conexion.php';
require_once '../Model/producto.php';
class ProductoController {

    public static function insertar($p) {
        try {
            $conex = new Conexion();
            $conex->query("insert into producto (codigo,nombre,precio) values ('$p->codigo','$p->nombre',$p->precio)");
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
                    $productos[] = new Producto($fila->codigo, $fila->nombre, $fila->precio);
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
                $p = new Producto($fila->codigo, $fila->nombre, $fila->precio);
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
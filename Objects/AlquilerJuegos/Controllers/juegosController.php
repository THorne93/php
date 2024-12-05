<?php

require_once '../Model/juegos.php';
require_once '../Controllers/Conexion.php';

class JuegosController {

    public static function insertar($j) {
        try {
            $conex = new Conexion();
            $conex->query("insert into juegos (Codigo,Nombre_juego,Nombre_consola,Anno,Precio,Alguilado,Imagen,descripcion) values ('$j->codigo','$j->nombreJuego','$j->nombreConsola',$j->anno,$j->precio,'$j->alquilado','$j->imagen','$j->descripcion')");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function borrar($j) {
        try {
            $conex = new Conexion();
            $conex->query("delete from juegos where Codigo='$j'");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function modify($id, $nombre, $anno, $consola, $precio) {
        try {
            $conex = new Conexion();
            $conex->query("update juegos set Nombre_juego='$nombre',Nombre_consola='$consola',Anno=$anno, Precio=$precio where Codigo='$id'");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function alquiler($id) {
        try {
            $conex = new Conexion();
            $conex->query("update juegos set Alguilado='Si' where Codigo='$id'");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
    public static function devolver($id) {
        try {
            $conex = new Conexion();
            $conex->query("update juegos set Alguilado='No' where Codigo='$id'");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAllByDep($dep) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from empleados where dep = '$dep'");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $empleados[] = new Empleado($fila->email, $fila->pass, $fila->nombre, $fila->salario, $fila->dep);
                }
            } else {
                $empleados = false;
            }
            $conex->close();
            return $empleados;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from juegos");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $juegos[] = new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
                }
            } else {
                $juegos = false;
            }
            $conex->close();
            return $juegos;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAllNoAq() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from juegos where alguilado = 'no'");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $juegos[] = new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
                }
            } else {
                $juegos = false;
            }
            $conex->close();
            return $juegos;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from juegos where Codigo = '$value'");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $j = new Juego($fila->Codigo, $fila->Nombre_juego, $fila->Nombre_consola, $fila->Anno, $fila->Precio, $fila->Alguilado, $fila->Imagen, $fila->descripcion);
            } else {
                $j = false;
            }
            $conex->close();
            return $j;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
}

?>
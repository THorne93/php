<?php

require_once '../Model/cliente.php';
require_once '../Controllers/Conexion.php';

class ClienteController {

    public static function insertar($c) {
        try {
            $conex = new Conexion();
            $pass = md5($c->clave);
            $conex->query("insert into cliente (DNI,Nombre,Apellidos,Direccion,Localidad,Clave,Tipo) values"
                    . " ('$c->dni','$c->nombre','$c->apellidos','$c->direccion','$c->localidad','$pass','cliente')");
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

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from cliente where dni = '$value'");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $c = new Cliente($fila->DNI, $fila->Nombre, $fila->Apellidos, $fila->Direccion, $fila->Localidad, $fila->Clave, $fila->Tipo);
            } else {
                $c = false;
            }
            $conex->close();
            return $c;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function validate($c, $pass) {
        $password = md5($pass);
        if ($c != null) {
            try {
                if ($c->clave == $password) {
                    return true;
                } else {
                    return false;
                }
            } catch (Exception $ex) {          
            }
        } else
            return false;
    }
}

?>
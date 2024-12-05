<?php

require_once '../Model/alquiler.php';
require_once '../Controllers/Conexion.php';

class AlquilerController {

    public static function insertar($cod, $cliente) {
        try {
            $conex = new Conexion();
            $fechaHoy = date('Y-m-d', time());
            $fechaDevol = date('Y-m-d', time() + 3600 * 24 * 7);
            $conex->query("insert into alquiler (Cod_juego,DNI_cliente ,Fecha_alquiler,Fecha_devol) values ('$cod','$cliente','$fechaHoy','$fechaDevol')");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function devolver($juego, $usuario) {
        try {
            $conex = new Conexion();
            $fechaHoy = date('Y-m-d', time());
            $conex->query("update alquiler set Fecha_devol='$fechaHoy' where Cod_juego='$juego' and DNI_cliente='$usuario'");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAllByDep($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler where Cod_juego = '$id'");
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

    public static function getAllByDni($dni) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler where DNI_cliente='$dni' group by Cod_juego");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $a[] = new Alquiler($fila->id, $fila->Cod_juego, $fila->DNI_cliente, $fila->Fecha_alquiler, $fila->Fecha_devol);
                }
            } else {
                $a = false;
            }
            $conex->close();
            return $a;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from alquiler where Cod_juego = '$value' order by id desc limit 1");
            if ($result->num_rows) {
                $fila = $result->fetch_object();
                $a = new Alquiler($fila->id, $fila->Cod_juego, $fila->DNI_cliente, $fila->Fecha_alquiler, $fila->Fecha_devol);
            } else {
                $a = false;
            }
            $conex->close();
            return $a;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
}

?>
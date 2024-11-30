<?php
require_once '../Model/empleado.php';
require_once '../Controllers/Conexion.php';
class EmpleadoController {

    public static function insertar($e) {
        try {
            $conex = new Conexion();
            $pass = md5($e->pass);
            $conex->query("insert into empleados (email,pass,nombre,salario,dep) values ('$e->email','$pass','$e->nombre',$e->salario,'$e->dep')");
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

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from empleados where email = '$value'");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $p = new Empleado($fila->email, $fila->pass, $fila->nombre, $fila->salario, $fila->dep);
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
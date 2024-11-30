<?php

require_once '../Model/realiza.php';
require_once '../Controllers/Conexion.php';

class RealizaController {

    public static function insertar($r) {
        try {
            $conex = new Conexion();
            $conex->query("insert into realiza (email,id_tarea,horas) values ('$r->email','$r->idTarea',$r->horas)");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function update($email, $idTarea, $horas) {
        try {
            $conex = new Conexion();
            $result = $conex->query("update realiza set horas = $horas where email='$email' and id_tarea=$idTarea");
          
            if ($conex->affected_rows) {
                $conex->close();

                return true;
            } else {
                $conex->close();

                return false;
            }
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAll() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from realiza");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $realiza[] = new Realiza($fila->email, $fila->id_tarea, $fila->horas);
                }
            } else {
                $realiza = false;
            }
            $conex->close();
            return $realiza;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getAllByEmail($email) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from realiza where email='$email'");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $realiza[] = new Realiza($fila->email, $fila->id_tarea, $fila->horas);
                }
            } else {
                $realiza = false;
            }
            $conex->close();
            return $realiza;
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
                $r = new Realiza($fila->email, $fila->id_tarea, $fila->horas);
            } else {
                $r = false;
            }
            $conex->close();
            return $r;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }
}

?>
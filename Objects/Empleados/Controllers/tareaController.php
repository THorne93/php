<?php

require_once '../Model/tarea.php';
require_once '../Controllers/Conexion.php';

class tareaController {

    public static function insertar($t) {
        try {
            $conex = new Conexion();
            $conex->query("insert into tareas (nombre,fecha_inicio,fecha_fin) values ('$t->nombre','$t->fechaIni','$t->fechaFin')");
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
            $result = $conex->query("select * from tareas");
            if ($result->num_rows) {
                // $p = new self();
                while ($fila = $result->fetch_object()) {
                    //  $p->nuevoProducto($fila->codigo, $fila->nombre, $fila->precio);
                    //  $productos[]=clone($p);
                    $tareas[] = new Tarea($fila->id, $fila->nombre, $fila->fecha_inicio, $fila->fecha_fin);
                }
            } else {
                $tareas = false;
            }
            $conex->close();
            return $tareas;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function find($value) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from tareas where id = '$value'");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $t = new Tarea($fila->id, $fila->nombre, $fila->fecha_inicio, $fila->fecha_fin);
            } else {
                $t = false;
            }
            $conex->close();
            return $t;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    public static function getLast() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from tareas order by id desc limit 1");
            if ($result->num_rows) {

                $fila = $result->fetch_object();
                $t = new Tarea($fila->id, $fila->nombre, $fila->fecha_inicio, $fila->fecha_fin);
            } else {
                $t = false;
            }
            $conex->close();
            return $t;
        } catch (Exception $ex) {
            echo "you fucked up<br>";
            die("ERROR en la BD" . $ex->getMessage());
        }
    }

    
}

?>
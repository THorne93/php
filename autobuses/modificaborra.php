<html>
    <head>
        <?php
        $correctChanges = false;
        $msg = null;
        session_start();
        include './style.php';

        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=autobuses;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
            $result = $conex->query("select * from viajes");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
        <title>Modifica/Borra</title>
    </head>
    <body>
        <div class="header">
            <h1>Modifica o borra un viaje</h1>
            <a href="index.html"><button>Menú</button></a>
        </div>

        <?php
        if ($result->rowCount()) {
            echo "<table>";
            echo "<tr><th>Fecha</th><th>Matricula</th><th>Origen</th><th>Destino</th><th>Plazas Libres</th><th>Opciones</th></tr>";
            while ($fila = $result->fetchObject()) {
                echo "<tr>";
                echo "<td>" . $fila->fecha . "</td><td>" . $fila->matricula . "</td><td>" . $fila->origen . "</td><td>" . $fila->destino . "</td><td>" . $fila->plazas_libres . "</td>";
                echo "<form action='' method='POST' style='display:inline;'><td><input type='hidden' name='editMatricula' value=$fila->matricula><input type='hidden' name='editDate' value=$fila->fecha><input type='submit' name='editar' value='Editar'><input type='submit' name='borrar' value='Borrar'></td></form>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>


        <?php
        if (isset($_POST["borrar"])) {
            try {
                $conex->beginTransaction();
                $result = $conex->prepare("delete from viajes where matricula= ? AND fecha = ?");
                $result->bindParam(1, $_POST["editMatricula"]);
                $result->bindParam(2, $_POST["editDate"]);
                $result->execute();
                if ($result->rowCount() == 1) {
                    $conex->commit();
                    echo "Viaje borrado correctamente";
                } else {
                    $conex->rollBack();
                    echo "error al realizar la actualizacion";
                }
            } catch (PDOException $ex) {
                $conex->rollBack();
                echo $ex->getMessage();
            }
        }
        if (isset($_POST["enviar"])) {
            $result3 = $conex->query("select * from autos where matricula='$_POST[matricula]'");
            $matriTest = $result3->fetchObject();
            if (($_POST["origen"] != $_POST["destino"]) && $_POST["plazasLibres"] >= 0 && $_POST["plazasLibres"] < $matriTest->num_plazas) {
                $correctChanges = true;

                try {
                    $conex->beginTransaction();
                    $result = $conex->prepare("UPDATE viajes SET fecha=?, matricula=?, origen=?, destino=?, plazas_libres=? WHERE fecha=? AND matricula=? AND origen=? AND destino=?");
                    $result->bindParam(1, $_POST["fecha"]);
                    $result->bindParam(2, $_POST["matricula"]);
                    $result->bindParam(3, $_POST["origen"]);
                    $result->bindParam(4, $_POST["destino"]);
                    $result->bindParam(5, $_POST["plazasLibres"]);
                    $result->bindParam(6, $_POST["fechaActual"]);
                    $result->bindParam(7, $_POST["matriActual"]);
                    $result->bindParam(8, $_POST["origenActual"]);
                    $result->bindParam(9, $_POST["destinoActual"]);
                    $result->execute();
                    if ($result->rowCount() == 1) {
                        $conex->commit(); //Confirmo los cambios.Los guarda.

                        $msg = "Viaje modificado correctamente";
                    } else {
                        $conex->rollBack();
                        echo "error al realizar la actualizacion";
                    }
                } catch (PDOException $ex) {
                    $conex->rollBack();
                    echo $ex->getMessage();
                }
            }
        }
        if (isset($_POST["editar"]) || (isset($_POST["enviar"]) && !$correctChanges)) {
            if (isset($_POST["editar"])) {
                $_SESSION["editDate"] = $_POST["editDate"];
                $_SESSION["editMatricula"] = $_POST["editMatricula"];
            }
            try {
                $conex->beginTransaction();
                $result = $conex->prepare("select * from viajes where matricula= ? AND fecha = ?");
                $result->bindParam(1, $_SESSION["editMatricula"]);
                $result->bindParam(2, $_SESSION["editDate"]);
                $result->execute();
                $result2 = $conex->query("select * from autos");
                $fila2 = $result->fetchObject();
                ?>
                <form action='' method='POST'>
                    Fecha:<input type='date' name='fecha' value='<?php
        if (isset($_POST["enviar"])) {
            echo $_POST["fecha"];
        } else {
            echo $fila2->fecha;
        }
                ?>'><br>

                    Matrícula: <select name = 'matricula'>
                        <?php
                        while ($fila = $result2->fetchObject()) {
                            echo "<option value = '$fila->matricula'";
                            if (isset($_POST["enviar"])) {
                                if ($_POST['matricula'] == $fila->matricula) {
                                    echo 'selected';
                                }
                            } else if ($fila2->matricula == $fila->matricula) {
                                echo 'selected';
                            }
                            echo ">$fila->matricula</option><br>";
                        }
                        ?>
                    </select><br>

                    Origen:<input type='text' id='origen' name='origen' value='<?php
                if (isset($_POST["enviar"])) {
                    echo $_POST["origen"];
                } else {
                    echo $fila2->origen;
                }
                        ?>'>
                                  <?php
                                  if (isset($_POST["enviar"])) {
                                      if ($_POST["origen"] === $_POST["destino"]) {
                                          echo "<p>El Origen no puede ser igual al destino</p>";
                                      }
                                  }
                                  ?>
                    <br>
                    Destino:<input type='text'  name='destino' value='<?php
                          if (isset($_POST["enviar"])) {
                              echo $_POST["destino"];
                          } else {
                              echo $fila2->destino;
                          }
                                  ?>'>
                                   <?php
                                   if (isset($_POST["enviar"])) {
                                       if ($_POST["origen"] === $_POST["destino"]) {
                                           echo "<p>El Destino no puede ser igual al Origen</p>";
                                       }
                                   }
                                   ?>
                    <br>
                    Plazas:<input type = 'text' readonly name = 'plazas'    
                    <?php
                    $result2 = $conex->query("select * from autos");
                    while ($fila = $result2->fetchObject()) {
                        if ($fila->matricula === $fila2->matricula) {
                            echo "value=$fila->num_plazas";
                        }
                    }
                    ?>
                                  ><br>
                    Plazas Libres:<input type = 'text' name = 'plazasLibres' value='<?php
            if (isset($_POST["enviar"])) {
                echo $_POST["plazasLibres"];
            } else {
                echo $fila2->plazas_libres;
            }
                    ?>'>
                                         <?php
                                         if (isset($_POST["enviar"])) {
                                             $result3 = $conex->query("select * from autos where matricula='$_POST[matricula]'");
                                             $matriTest = $result3->fetchObject();
                                             if ($_POST["plazasLibres"] > $matriTest->num_plazas) {
                                                 echo "<p>Has seleccionado una matricula con " . $matriTest->num_plazas . " plazas libres. Las plazas libres tienen que ser inferior a " . $matriTest->num_plazas . "</p>";
                                             }
                                             if ($_POST["plazasLibres"] < 0) {
                                                 echo "<p>Tienes que poner un número superior o igual a 0</p>";
                                             }
                                         }
                                         ?>
                    <br>
                    <input type="hidden" name="fechaActual" value="<?php echo $fila2->fecha ?>">
                    <input type="hidden" name="matriActual" value="<?php echo $fila2->matricula ?>">
                    <input type="hidden" name="origenActual" value="<?php echo $fila2->origen ?>">
                    <input type="hidden" name="destinoActual" value="<?php echo $fila2->destino ?>">
                    <input type = 'submit' name = 'enviar' value = 'Editar'>
                </form>
                <?php
            } catch (PDOException $ex) {
                $conex->rollBack();
                echo $ex->getMessage();
            }
        }
        if ($msg != null) {
            echo $msg;
        }
        ?>


    </body>
</html>

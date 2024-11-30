<html>
    <head>
        <?php
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location:index.php");
        }
        require_once './style.php';

        $colours = ["red", "blue", "green", "yellow", "pink", "brown", "orange"];
        $letras = ["Times New Roman", "Roboto", "Ariel", "Verdana", "Wingdings"];
        $sizes = [12, 16, 20, 24, 28, 32];
        ?>
        <title>title</title>
    </head>
    <?php echo"Hola " . $_SESSION["usuario"]->nombre . " " . $_SESSION["usuario"]->apellidos ?><br><br><br>
    <?php
    if (isset($_POST["modificar"])) {
        try {
            $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');

            $result = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
            if (!empty($_POST["nombre"]) && !empty($_POST["apell"]) && !empty($_POST["dir"]) && !empty($_POST["local"]) && !empty($_POST["clave"]) && !empty($_POST["clave2"]) && $_POST["clave"] == $_POST["clave2"]) {
                $stmt = $conex->prepare("update perfil_usuario set nombre=?,apellidos=?,direccion=?,localidad=?,pass=?,color_letra=?,color_fondo=?,tipo_letra=?,tam_letra=? where user=?");
                $stmt->bindParam(1, $_POST["nombre"]);
                $stmt->bindParam(2, $_POST["apell"]);
                $stmt->bindParam(3, $_POST["dir"]);
                $stmt->bindParam(4, $_POST["local"]);
                $passNew = password_hash($_POST["clave"], PASSWORD_DEFAULT);
                $stmt->bindParam(5, $passNew);
                $stmt->bindParam(6, $_POST["colorLetra"]);
                $stmt->bindParam(7, $_POST["colorFondo"]);
                $stmt->bindParam(8, $_POST["tipoLetra"]);
                $stmt->bindParam(9, $_POST["tamLetra"]);
                $stmt->bindParam(10, $_POST["usu"]);

                if ($stmt->execute()) {
                    $result2 = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
                    $usuario = $result2->fetchObject();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["login"] = 1;
                    header("location: inicio.php");
                } else {
                   // $conex->rollBack();
                }
            } else {
                
            }
        } catch (PDOException$ex) {
            echo $ex->getMessage();
        }
    }

    if (isset($_POST["salir"])) {
        session_destroy();
        header("location:index.php");
    }
    ?>

    <body>
        <form action="" method="POST"><input type="submit" name="salir" value="Salir"></form>    

        <form action="" method="POST">
            Nombre:<input type="text" name="nombre" value="<?php
            if (isset($_POST["modificar"])) {
                echo $_POST["nombre"];
            } else {
                echo $_SESSION["usuario"]->nombre;
            }
            ?>"><br> 

            Apellidos:<input type="text" name="apell" value="<?php
            if (isset($_POST["modificar"])) {
                echo $_POST["apell"];
            } else {
                echo $_SESSION["usuario"]->apellidos;
            }
            ?>"><br> 
            Dirección:<input type="text" name="dir" value="<?php
            if (isset($_POST["modificar"])) {
                echo $_POST["dir"];
            } else {
                echo $_SESSION["usuario"]->direccion;
            }
            ?>"><br> 
            Localidad:<input type="text" name="local" value="<?php
            if (isset($_POST["modificar"])) {
                echo $_POST["local"];
            } else {
                echo $_SESSION["usuario"]->localidad;
            }
            ?>"><br> 
            Usuario:<input type="text" readonly name="usu" value="<?php echo $_SESSION["usuario"]->user ?>"><br> 
            Clave:<input type="password" name="clave"><br> 
            Repetir Clave:<input type="password" name="clave2"><?php
            if (isset($_POST["modificar"])) {
                if (empty($_POST["clave2"])) {
                    echo "<p>No has confirmado la contraseña</p>";
                } else if ($_POST["clave"] != $_POST["clave2"]) {
                    echo "<p>Las contraseñas no coinciden</p>";
                }
            }
            ?><br>


            Color Letra:<select name = "colorLetra">
                <?php
                foreach ($colours as $value) {
                    echo "<option value='$value' ";
                    if (isset($_POST["modificar"])) {
                        if ($_POST["colorLetra"] == $value) {
                            echo 'selected';
                        }
                    } else if ($value == $_SESSION["usuario"]->color_letra) {
                        echo 'selected';
                    }
                    echo">$value</option>";
                }
                ?>
            </select><br> 
            Color Fondo:<select name="colorFondo">            
                <?php
                foreach ($colours as $value) {
                    echo "<option value='$value' ";
                    if (isset($_POST["modificar"])) {
                        if ($_POST["colorFondo"] == $value) {
                            echo 'selected';
                        }
                    } else if ($value == $_SESSION["usuario"]->color_fondo) {
                        echo 'selected';
                    }
                    echo">$value</option>";
                }
                ?>
            </select><br> 
            Tipo Letra:<select name="tipoLetra">
                <?php
                foreach ($letras as $value) {
                    echo "<option value='$value' ";
                    if (isset($_POST["modificar"])) {
                        if ($_POST["tipoLetra"] == $value) {
                            echo 'selected';
                        }
                    } else if ($value == $_SESSION["usuario"]->tipo_letra) {
                        echo 'selected';
                    }
                    echo">$value</option>";
                }
                ?>
            </select><br>  
            Tamaño Letra:<select name="tamLetra">
                <?php
                foreach ($sizes as $value) {
                    echo "<option value='$value' ";
                    if (isset($_POST["modificar"])) {
                        if ($_POST["tamLetra"] == $value) {
                            echo 'selected';
                        }
                    } else if ($value == $_SESSION["usuario"]->tam_letra) {
                        echo 'selected';
                    }
                    echo">$value</option>";
                }
                ?>
            </select><br>  
            <a href="inicio.php"><input type="button" value="Volver"></a><input type="submit" name="modificar" value="Modificar">
        </form>
    </body>

</html>


<html>
    <head>
        <?php
        require_once './style.php';
        $colours = ["red", "blue", "green", "yellow", "pink", "brown", "orange"];
        $letras = ["Times New Roman", "Roboto", "Ariel", "Verdana"];
        $sizes = [12, 16, 20, 24, 28, 32];
        ?>
        <title>title</title>
    </head>
    <body>
        <form action="" method="POST">
            Nombre:<input type="text" name="nombre"><br> 
            Apellidos:<input type="text" name="apell"><br> 
            Dirección:<input type="text" name="dir"><br> 
            Localidad:<input type="text" name="local"><br> 
            Usuario:<input type="text" name="usu"><br> 
            Clave:<input type="password" name="clave"><br> 
            Repetir Clave:<input type="password" name="clave2"><br> 
            Color Letra:<select name="colorLetra">
                <?php
                foreach ($colours as $value) {
                    echo"<option value=$value>$value</option>";
                }
                ?>
            </select><br> 
            Color Fondo:<select name="colorFondo">
                <?php
                foreach ($colours as $value) {
                    echo"<option value=$value>$value</option>";
                }
                ?>
            </select><br> 
            Tipo Letra:<select name="tipoLetra">
                <?php
                foreach ($letras as $value) {
                    echo"<option value=$value>$value</option>";
                }
                ?>
            </select><br>  
            Tamaño Letra:<select name="tamLetra">
                <?php
                foreach ($sizes as $value) {
                    echo"<option value=$value>$value</option>";
                }
                ?>
            </select><br>  
            <a href="index.php"><input type="button" value="Cancelar"></a><input type="submit" name="register" value="Registrar">
        </form>
    </body>
</html>

<?php
if (isset($_POST["register"])) {
    try {
        $conex = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');

        $result = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
        if ($result->rowCount()) {
            echo "Tienes que elegir un usuario unico";
        } else if (!empty($_POST["nombre"]) && !empty($_POST["apell"]) && !empty($_POST["dir"]) && !empty($_POST["local"]) && !empty($_POST["clave"]) && !empty($_POST["clave2"]) && $_POST["clave"] == $_POST["clave2"]) {
            $conex->beginTransaction();
            $stmt = $conex->prepare("insert into perfil_usuario (nombre,apellidos,direccion,localidad,user,pass,color_letra,color_fondo,tipo_letra,tam_letra) values (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $_POST["nombre"]);
            $stmt->bindParam(2, $_POST["apell"]);
            $stmt->bindParam(3, $_POST["dir"]);
            $stmt->bindParam(4, $_POST["local"]);
            $stmt->bindParam(5, $_POST["usu"]);
            $passNew = password_hash($_POST["clave"], PASSWORD_DEFAULT);
            $stmt->bindParam(6, $passNew);
            $stmt->bindParam(7, $_POST["colorLetra"]);
            $stmt->bindParam(8, $_POST["colorFondo"]);
            $stmt->bindParam(9, $_POST["tipoLetra"]);
            $stmt->bindParam(10, $_POST["tamLetra"]);

            if ($stmt->execute()) {
                $conex->commit();
                session_start();
                $result2 = $conex->query("select * from perfil_usuario where user='$_POST[usu]'");
                $usuario = $result2->fetchObject();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["login"] = 1;
                header("location: inicio.php");
            } else {
                $conex->rollBack();
            }
        } else {
            echo "errores en el formulario";
        }
    } catch (PDOException$ex) {
        echo $ex->getMessage();
    }
}
?>

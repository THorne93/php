<html>
    <head>
        <title>title</title>
    </head>
    <?php
    if (isset($_POST["enviar"])) {
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
            $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4', 'dwes', 'abc123.', $opciones);
            $conex->beginTransaction();
            $result = $conex->prepare("select * from usuarios where usuario=?");
            $result->bindParam(1, $_POST["usuario"]);
            $result->execute();
            if ($result->rowCount() == 1) {
                $pwd = $result->fetchObject();

                if (md5($_POST["clave"]) == $pwd->clave) {
                    header('Location: datos.php');
                } else {
                    echo "clave incorrecto ";
                }
            } else {
                echo "usuario incorrecto ";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    ?>
    <body>
        <form action="" method="POST">
            Usuario: <input type="text" name="usuario"><br>
            Clave: <input type="password" name="clave"><br>
            <input type="submit" name="enviar" value="Acceder">
        </form>
    </body>



</html>

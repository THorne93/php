<form action="" method="POST">
    usuario: <input type="text" name="usu"><br>
    password: <input type="password" name="pass"><br>
    <input type="submit" name="enviar" value="Enviar"><br>
    <input type="submit" name="enviar2" value="Enviar2"><br>
</form>
<?php
if (isset($_POST["enviar"])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $result = $conex->query("SELECT * from marketing WHERE usuario=BINARY'$_POST[usu]' AND password=BINARY'$_POST[pass]'");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    if ($result->num_rows) {
        echo "CREDENCIALES CORRECTAS<br>";
        $fila = $result->fetch_object();
        echo "Hola " . $fila->Nombre . " " . $fila->Apellidos;
    } else {
        echo "CREDENCIALES INCORRECTAS";
    }
}

if (isset($_POST["enviar2"])) {

    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $stmt = $conex->prepare("SELECT * from marketing WHERE usuario=? AND password=?");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    $stmt->bind_param("ss", $_POST["usu"], $_POST["pass"]);

    if ($stmt->execute()) {

        $result = $stmt->get_result();

        if ($result->num_rows) {
            $fila = $result->fetch_object();
            echo "CREDENCIALES CORRECTAS<br>";
            echo "Hola " . $fila->Nombre . " " . $fila->Apellidos;
        } else {
            echo "CREDENCIALES INCORRECTAS";
        }
    }
}
?>


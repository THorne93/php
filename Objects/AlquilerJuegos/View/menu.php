<span>
    <?php
    if (isset($_SESSION["usuario"])) {
        echo "<h1>Hola " . $_SESSION["usuario"]->nombre . " </h1>";
    } else {
        echo "<div class='button-group'>";
        echo "<a href='login.php'><input type='button' value='Login'></a>";
        echo "<a href='registrar.php'><input type='button' value='Registro'></a>";
        echo"</div>";
    }
    ?>

</span>    <br>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]->tipo == "cliente" || $_SESSION["usuario"]->tipo == "admin") {
        echo "<span>";
        echo "<div class = 'button-group'>";
        echo"<form action ='' method = 'post'>";
        echo"<input type = 'submit' name = 'todos' value = 'Todos'></a>";
        echo"<input type = 'submit' name = 'noAq' value = 'No Aquilados'></a>";
        echo"<a href = 'misalquilados.php'><input type = 'button' value = 'Mis Aquilados'></a>";
        echo"<a href = 'salir.php'><input type = 'button' value = 'Salir'></a>";
        echo"</form></div>";
        echo"</span> <br>";
    } if ($_SESSION["usuario"]->tipo == "admin") {
        echo "<span>";
        echo"<div class = 'button-group'>";
        echo"<form action = '' method = 'post'></form>";
        echo"<a href = 'nuevojuego.php'><input type = 'button' value = 'Nuevo Juego'></a>";
        echo"   </div>";
        echo"</span>";
    }
}
?>
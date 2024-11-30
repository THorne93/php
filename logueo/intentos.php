<html>
    <head>
        <?php
        session_start();

        if (isset($_SESSION["login"])) {
            header("location: inicio.php");
            exit();
        }
        require_once './style.php';
        session_destroy();
        ?>
        <title>title</title>
    </head>
    <body>
        <h1>Has agotado el número de intentos</h1><br>
        <h2>(Cierre el navegador y vuelva a intentarlo)</h2>
    </body>
</html>

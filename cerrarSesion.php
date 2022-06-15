

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cerrar sesión</title>
    </head>
    <body>
        <h2>Has Cerrado Sesion correctamente</h2>
        <br/>
        <p><a href="login.php">Ir al Login</a></p>
        <?php
        session_start();
        session_destroy();
        header("Location: index.php");
        ?>
    </body>
</html>


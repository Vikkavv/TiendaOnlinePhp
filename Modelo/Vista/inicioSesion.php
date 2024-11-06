<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>

<form action="../Controlador/" method="post">
    <fieldset>
            <br>
        <legend>Inicio de sesión</legend>

        <label for="nickname">Apodo:</label>
        <input type="text" name="nickname" id="nickname" required>
        <?php
            if (isset($_SESSION["mensajeNickname"])) {
                echo $_SESSION["mensajeNickname"];
            }
        ?>
            <br><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" minlength="5" required>
        <?php
        if (isset($_SESSION["mensajePassword"])) {
            echo $_SESSION["mensajePassword"];
        }
        ?>
            <br><br>
        <input type="submit" name="enviaInicio">
        <input type="reset">
    </fieldset>
</form>

<p>¿No tienes cuenta? Regístrate <a href="registro.php">aquí</a>.</p>

</body>
</html>
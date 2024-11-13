<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>

<form action="../Controlador/controlPeticionesCliente.php" method="post">
    <fieldset>
            <br>
        <legend>Inicio de sesión</legend>

        <label for="nickname">Apodo:</label>
        <input type="text" name="nickname" id="nickname">
        <?php
            if (isset($_SESSION["mensajeNickname"])) {
                echo $_SESSION["mensajeNickname"];
                unset($_SESSION["mensajeNickname"]);
            }
            if (isset($_SESSION["nicknameVacio"])) {
                echo $_SESSION["nicknameVacio"];
                unset($_SESSION["nicknameVacio"]);
            }
        ?>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="password" id="password" minlength="5">
        <?php
            if (isset($_SESSION["mensajePassword"])) {
                echo $_SESSION["mensajePassword"];
                unset($_SESSION["mensajePassword"]);
            }
            if (isset($_SESSION["passwordVacio"])) {
                echo $_SESSION["passwordVacio"];
                unset($_SESSION["passwordVacio"]);
            }
        ?>
            <br><br>
        <?php
            if (isset($_SESSION["errorCliente"])) {
                echo $_SESSION["errorCliente"]. "<br>";
                unset($_SESSION["errorCliente"]);
            }
        ?>
        <input type="submit" name="enviaInicio">
        <input type="reset">
    </fieldset>
</form>

<p>¿No tienes cuenta? Regístrate <a href="registro.php">aquí</a>.</p>

</body>
</html>
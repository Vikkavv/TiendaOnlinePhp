<?php
session_start();
session_name("registro");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

<form action="../Controlador/controlPeticionesCliente.php" method="post">
    <fieldset>
        <legend>Registro</legend>
            <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <?php
            if (isset($_SESSION["mensajeNombre"])) {
                echo $_SESSION["mensajeNombre"];
            }
        ?>
            <br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
            <br><br>
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
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required>
            <br><br>
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" required>
            <br><br>
        <input type="submit" name="enviaRegistro">
        <input type="reset">
    </fieldset>
</form>

<p>¿Ya tienes cuenta? Inicica sesión <a href="inicioSesion.php">aquí</a>.</p>

</body>
</html>

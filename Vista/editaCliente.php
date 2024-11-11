<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita cliente</title>
</head>
<body>
<h1>Edita los datos del cliente</h1>

<form action="../Controlador/controlPeticionesCliente.php" method="post">
    <label for="id">Indica el id del cliente a editar: </label>
    <input type="text" id="id" name="id" required>
    <?php
        if (isset($_SESSION['mensajeEditaCliente'])) {
            echo $_SESSION['mensajeEditaCliente'];
        }
    ?>
    <br><br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br><br>
    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido">
    <br><br>
    <label for="nickname">Apodo:</label>
    <input type="text" name="nickname" id="nickname">
    <br><br>
    <label for="password">Contraseña:</label>
    <input type="text" name="password" id="password" minlength="5">
    <br><br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    <br><br>
    <label for="domicilio">Domicilio:</label>
    <input type="text" name="domicilio" id="domicilio">

    <br><br>
    <input type="submit" name="editaCliente">
    <input type="reset">
</form>
</body>
</html>

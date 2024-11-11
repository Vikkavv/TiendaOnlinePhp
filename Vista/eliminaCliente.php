<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina cliente</title>
</head>
<body>
    <h1>Elimina cliente</h1>

    <form action="../Controlador/controlPeticionesCliente.php" method="post">
        <label for="id">Indica el id del cliente a eliminar</label>
        <br><br>
        <input type="text" id="id" name="id" required>
        <?php
            if (isset($_SESSION['mensajeCliente'])) {
                echo $_SESSION['mensajeCliente'];
            }
        ?>
        <br><br>
        <input type="submit" name="eliminaCliente">
        <input type="reset">
    </form>
</body>
</html>

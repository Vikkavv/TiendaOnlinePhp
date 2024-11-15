<?php
include_once "../Modelo/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita cliente</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>

<body>
    <div class="container-edita">
        <div class="card-edita">
            <h1>Edita los datos del cliente</h1>

            <form action="../Controlador/controlPeticionesCliente.php" method="post">
                <label for="id">Indica el id del cliente a editar </label>
                <br>
                <input type="text" id="id" name="id" required>
                <?php
                if (isset($_SESSION['mensajeEditaCliente'])) {
                    echo $_SESSION['mensajeEditaCliente'];
                    unset($_SESSION['mensajeEditaCliente']);
                }
                ?>
                <br><br>
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nombre" id="nombre">
                <?php
                if (isset($_SESSION['mensajeNombre'])) {
                    echo $_SESSION['mensajeNombre'];
                    unset($_SESSION['mensajeNombre']);
                }
                ?>
                <br><br>
                <label for="apellido">Apellido</label>
                <br>
                <input type="text" name="apellido" id="apellido">
                <br><br>
                <label for="nickname">Apodo</label>
                <br>
                <input type="text" name="nickname" id="nickname">
                <?php
                if (isset($_SESSION['mensajeNickname'])) {
                    echo $_SESSION['mensajeNickname'];
                    unset($_SESSION['mensajeNickname']);
                }
                ?>
                <br><br>
                <label for="password">Contraseña</label>
                <br>
                <input type="password" name="password" id="password" minlength="5">
                <?php
                if (isset($_SESSION['mensajePassword'])) {
                    echo $_SESSION['mensajePassword'];
                    unset($_SESSION['mensajePassword']);
                }
                ?>
                <br><br>
                <label for="telefono">Teléfono</label>
                <br>
                <input type="text" name="telefono" id="telefono">
                <br><br>
                <label for="domicilio">Domicilio</label>
                <br>
                <input type="text" name="domicilio" id="domicilio">

                <br><br>
                <input type="submit" name="editaCliente">
                <input type="reset">
            </form>
        </div>
    </div>

</body>

</html>
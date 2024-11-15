<?php
require_once "../Modelo/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>

<body>
    <div class="container-login">
        <div class="card-login">
            <form action="../Controlador/controlPeticionesCliente.php" method="post">
                <br>
                <p class="titulo">Inicio de sesión</p>

                <label for="nickname">Apodo</label>
                <br>
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
                <label for="password">Contraseña</label>
                <br>
                <input type="password" name="password" id="password" minlength="5">
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
                    echo $_SESSION["errorCliente"] . "<br>";
                    unset($_SESSION["errorCliente"]);
                }
                ?>
                <input type="submit" name="enviaInicio" value="Iniciar sesión">
            </form>
            <br>
            <p class="crearCuenta">¿No tienes cuenta? <a href="registro.php">Regístrate</a>.</p>
        </div>
    </div>



</body>

</html>
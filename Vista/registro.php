<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<?php
    require_once "../Modelo/DAOCliente.php";
    require_once "../Modelo/DAOProducto.php";
?>
<body>
    <nav>
        <div>
            <?php

                $class = "hidden";
                $nombre = "";
                $apellido = "";
                if(isset($_SESSION['cliente'])){
                    $class = "";
                    $nombre = $_SESSION['cliente']->getNombre();
                    $apellido = $_SESSION['cliente']->getApellido();
                }
                print '<p class="'.$class.'">Administrador '.$nombre.' '.$apellido.'</p> <a class="btn '.$class.'" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a>'
            ?>
            
        </div>
        <div>
            <a href="index.php">Página Principal</a>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a class="hidden" href="registro.php">Registrarse</a>
            <img src="">
        </div>
    </nav>
    <div class="container-login">
        <div class="card-login">
            <form action="../Controlador/controlPeticionesCliente.php" method="post">

                <p class="titulo">Registro</p>
                <br>
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nombre" id="nombre">
                <?php
                if (isset($_SESSION["mensajeNombre"])) {
                    echo $_SESSION["mensajeNombre"];
                    unset($_SESSION["mensajeNombre"]);
                }
                if (isset($_SESSION["nombreVacio"])) {
                    echo $_SESSION["nombreVacio"];
                    unset($_SESSION["nombreVacio"]);
                }
                ?>
                <br><br>
                <label for="apellido">Apellido</label>
                <br>
                <input type="text" name="apellido" id="apellido">
                <?php
                if (isset($_SESSION["apellidoVacio"])) {
                    echo $_SESSION["apellidoVacio"];
                    unset($_SESSION["apellidoVacio"]);
                }
                ?>
                <br><br>
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
                <label for="telefono">Teléfono</label>
                <br>
                <input type="text" name="telefono" id="telefono">
                <?php
                if (isset($_SESSION["telefonoVacio"])) {
                    echo $_SESSION["telefonoVacio"];
                    unset($_SESSION["telefonoVacio"]);
                }
                ?>
                <br><br>
                <label for="domicilio">Domicilio</label>
                <br>
                <input type="text" name="domicilio" id="domicilio">
                <?php
                if (isset($_SESSION["domicilioVacio"])) {
                    echo $_SESSION["domicilioVacio"];
                    unset($_SESSION["domicilioVacio"]);
                }
                ?>
                <br><br>
                <?php
                if (isset($_SESSION["existeCliente"])) {
                    echo $_SESSION["existeCliente"] . "<br>";
                    unset($_SESSION["existeCliente"]);
                }
                ?>
                <input type="submit" name="enviaRegistro" value="Registrarse">
            </form>

            <p class="existeCuenta">¿Ya tienes cuenta? <a href="inicioSesion.php">Inicica sesión</a>.</p>
        </div>
    </div>
</body>

</html>
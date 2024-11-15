<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita cliente</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<?php
    require_once "../Modelo/DAOCliente.php";
    require_once "../Modelo/DAOProducto.php";
    app_security();
?>
<body class="vFlex">
    <nav>
        <div>
            <?php
            $class = "hidden";
            $nombre = "";
            $apellido = "";
            if (isset($_SESSION['cliente'])) {
                $class = "";
                $nombre = $_SESSION['cliente']->getNombre();
                $apellido = $_SESSION['cliente']->getApellido();
            }
            print '<p class="' . $class . '">Administrador ' . $nombre . ' ' . $apellido . ' <a class="btn" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a></p>'
            ?>
        </div>
        <div>
            <a href="index.php">Página Principal</a>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <a href="trastienda.php">Trastienda</a>
            <a href=""><img src="" alt=""></a>
        </div>
    </nav>
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
    <footer class="footer">
        <div>
            <h3>Información de contacto</h3>
            <ul>
                <li>Avenida de la Paz 45, Getafe</li>
                <li> +34 123 456 789</li>
                <li>soporte@tiendaonline.com</li>
            </ul>
        </div>
        <div>
            <h3>Políticas</h3>
            <ul>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="#">Términos y condiciones</a></li>
                <li><a href="#">Política de devoluciones o reembolsos</a></li>
            </ul>
        </div>
        <div>
            <h3>Enlaces rápidos</h3>
            <ul>
                <li><a href="gestionCliente.php">Gestión de clientes</a></li>
                <li><a href="gestionProducto.php">Gestión de productos</a></li>
                <li><a href="carrito.php">Carrito</a></li>
            </ul>
        </div>
        <div>
            <h3>Misceláneo</h3>
            <ul>
                <li><a href="sobreNosotros.php">Sobre nosotros</a></li>
                <li><a href="#">Trabaja con nosotros</a></li>
                <li class="hidden">a</li>
            </ul>
        </div>
    </footer>
</body>

</html>
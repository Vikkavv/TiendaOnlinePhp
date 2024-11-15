<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                if(isset($_SESSION['cliente'])){
                    $class = "";
                    $nombre = $_SESSION['cliente']->getNombre();
                    $apellido = $_SESSION['cliente']->getApellido();
                }
                print '<p class="'.$class.'">Administrador '.$nombre.' '.$apellido.'</p> <a class="btn" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a>'
            ?>
            
        </div>
        <div>
            <a href="index.php">Página Principal</a>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <a href="trastienda.php">Trastienda</a>
            <img src="">
        </div>
    </nav>
    <div class="container-aniadeP">
        <div class="card-aniadeP">
            <div>
            <h1>Añadir un producto</h1>
            <form action="../Controlador/controlPeticionesProducto.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre del producto </label><br>
                <?php
                $alert = '';
                if (isset($_SESSION['NameNotValid'])) {
                    $alert = "El nombre debe contener únicamente números y letras y tener mínimo 5 caracteres.";
                    unset($_SESSION['NameNotValid']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                } elseif (isset($_SESSION['NameAE'])) {
                    $alert = "El nombre del producto ya existe, debe de ser único.";
                    unset($_SERVER['NameAE']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                }
                ?>
                <input type="text" name="nombre" required><br>
                <label for="descripcion">Descripcion del producto </label><br>
                <input type="text" name="descripcion" required><br>
                <label for="precio">Precio del producto: </label><br>
                <?php
                if (isset($_SESSION['NegPrice'])) {
                    $alert = "El precio debe de ser positivo.";
                    unset($_SERVER['NegPrice']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                }
                ?>
                <input type="text" name="precio" required><br>
                <label for="foto">Foto de producto</label><br>
                <input type="file" name="ficheroSubida" id="ficheroSubida"><br>
                <input type="submit" name="insert" value="Crear producto">
            </form>
            </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Document</title>
</head>
<?php
    require_once "../Modelo/DTOCliente.php";
    require_once "../Modelo/db.php";
    app_security();
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
                print '<p class="'.$class.'">Administrador '.$nombre.' '.$apellido.'</p>'
            ?>
        </div>
        <div>
            <a href="index.php">Página Principal</a>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <a href="trastienda.php">Trastienda</a>
            <a href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"></a>
        </div>
    </nav>
    <h1 class="center xxl">PRODUCTOS</h1>
    <div class="container grid-3">
        <a href="insertProduct.php" class="card">
            <p class="xxl">Crear Producto</p>
        </a>
        <a class="card" href="updateProduct.php">
            <p class="xxl">Actualizar producto</p>
        </a>
        <a href="show-DelProducts.php" class="card">
            <p class="xxl">Mostrar y borrar productos</p>
        </a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Trastienda</title>
</head>
<body>
    <nav>
        <div>
            <?php
                require_once "../Modelo/DTOCliente.php";
                require_once "../Modelo/db.php";
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
            <a href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"></a>
        </div>
    </nav>
    <div class="container grid-2">
    <a href="gestionCliente.php" class="card">
        <p class="xxl">Gestionar Clientes</p>
    </a>
    <a href="gestionProducto.php" class="card">
        <p class="xxl">Gestionar Productos</p>
    </a>
    </div>
</body>
</html>
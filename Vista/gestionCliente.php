<?php
    require_once "../Modelo/DTOCliente.php";
    require_once "../Modelo/db.php";
    app_security();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Gestionar clientes</title>
</head>
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
    <h1 class="center xxl">Clientes</h1>
    <div class="container grid-3">
        <a href="editaCliente.php" class="card">
            <p class="xxl">Editar un cliente</p>  
        </a>
        <a href="eliminaCliente.php" class="card">
            <p class="xxl">Eliminar un cliente</p> 
        </a>
        <a href="mostrarClientes.php" class="card">
            <p class="xxl">Mostrar los clientes</p> 
        </a>
    </div>
</body>
</html>

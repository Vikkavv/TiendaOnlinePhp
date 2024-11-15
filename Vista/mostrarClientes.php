<?php
require_once "../Modelo/DAOCliente.php";

$DAOCliente = new DAOCliente();

$arrayClientes = $DAOCliente->selectAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos de clientes</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>

<body>
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
            print '<p class="' . $class . '">Administrador ' . $nombre . ' ' . $apellido . '</p>'
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

    <div class="container">
    <h1 class="center xxl">CLIENTES</h1>
        <table class="table">
            <?php
            foreach ($arrayClientes as $cliente) {
                print "<tr>";
                print "<td>" . $cliente->getId() . "</td>";
                print "<td>" . $cliente->getNombre() . "</td>";
                print "<td>" . $cliente->getApellido() . "</td>";
                print "<td>" . $cliente->getNickname() . "</td>";
                print "<td>" . $cliente->getPassword() . "</td>";
                print "<td>" . $cliente->getTelefono() . "</td>";
                print "<td>" . $cliente->getDomicilio() . "</td>";
                print "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>
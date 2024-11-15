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

<body class="vFlex" style="overflow-x: hidden;">
    <div style="width: 100%;">
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
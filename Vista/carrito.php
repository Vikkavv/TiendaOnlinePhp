<?php
    require_once "../Modelo/DTOCliente.php";
    require_once "../Modelo/DAOProducto.php";
    app_security("inicioSesion.php");

function mostrarCarrito(){
    print '<table class="table">';
    foreach ($_SESSION["carrito"] as $producto) {
        print "<tr>";
        print "<td><img src='" . $producto->getRuta() . "'></td>";
        print "<td>" . $producto->getNombre() . "</td>";
        print "<td>" . $producto->getDescripcion() . "</td>";
        print "<td>" . $producto->getPrecio() . "€</td>";
        print "<td><a class='btn red' href='carrito.php?idb=".$producto->getId()."'>Borrar producto</a></td>";
        print "</tr>";
    }
    print '</table>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Carrito</title>
</head>
<body class="vFlex" style="overflow-x: hidden;">
    <div style="width: 100%;">
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
                    print '<p class="'.$class.'">Administrador '.$nombre.' '.$apellido.' <a class="btn" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a></p>'
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
        <div>
            <h1 class="center xxl">Carrito</h1>
            <div class="container">
            <?php
                if (!isset($_SESSION["carrito"])){
                    $_SESSION["carrito"] = [];
                }

                if (isset($_GET["idb"])){
                    foreach ($_SESSION["carrito"] as $id => $item){
                        if ($item->getId() == $_GET["idb"]){
                            unset($_SESSION["carrito"][$id]);
                            header("location:carrito.php");
                            exit();
                        }
                    }
                }

                if (isset($_GET["id"])) {
                    $DAOProducto  = new DAOProducto();
                    $_SESSION["carrito"][] = $DAOProducto->getProductByID($_GET["id"]);

                    header("location:index.php");
                    exit();
                }
                else{
                    if (count($_SESSION["carrito"]) > 0){
                        mostrarCarrito();
                    }
                    else{
                        print "<h3 class='center'>El carrito está vacío</h3>";
                    }
                }
            ?>
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


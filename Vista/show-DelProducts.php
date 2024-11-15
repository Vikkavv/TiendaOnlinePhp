<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Document</title>
</head>
<?php
    require_once "../Modelo/DAOCliente.php";
    require_once "../Modelo/DAOProducto.php";
    app_security();
?>
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
        <h1 class="center xxl">PRODUCTOS</h1>
        <div class="container">
            <table class="table">
                <tbody>
                    <?php
                        $DAOProducto = new DAOProducto();
                        $products = $DAOProducto->getAllProducts();
                        foreach ($products as $key => $product) {
                            print '<tr>';
                                print '<td>'. $product->getId() .'</td>';
                                print '<td>'. $product->getNombre() .'</td>';
                                print '<td><a title="Ir a la página del producto" class="btn btn-20" href="product.php?id='. $product->getId() .'">⬈</a></td>';
                                print '<td>'. $product->getDescripcion() .'</td>';
                                print '<td>'. $product->getPrecio() .'€</td>';
                                print '<td>'. $product->getClienteId().'</td>';
                                print '<td><a class="btn red" href="deleteProduct.php?id='. $product->getId() .'">Borrar producto</a></td>';
                            print '</tr>';
                        }
                    ?>
                </tbody>
            </table>
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
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
        <div class="container">
        <table class="table">
            <tbody>
                <?php
                    $DAOProducto = new DAOProducto();
                    $products = $DAOProducto->getAllProducts();
                    foreach ($products as $key => $product) {
                        print '<tr>';
                            print '<td>'. $product->getId() .'</td>';
                            print '<td><a href="product.php?id='. $product->getId() .'">'. $product->getNombre() .'</a></td>';
                            print '<td>'. $product->getDescripcion() .'</td>';
                            print '<td>'. $product->getPrecio() .'€</td>';
                            print '<td>'. $product->getClienteId().'</td>';
                            print '<td><a href="deleteProduct.php?id='. $product->getId() .'">Borrar producto</a></td>';
                        print '</tr>';
                    }
                ?>
            </tbody>
    </table>
        </div>
</body>
</html>
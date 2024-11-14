<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <title>Bienvenido a nuestra tienda online | TiendaOnline</title>
</head>
<?php
    include_once "../Modelo/DTOCliente.php";
    include_once "../Modelo/DAOProducto.php";
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
                print '<p class="'.$class.'">¡Bienvenido '.$nombre.' '.$apellido.'!</p>'
            ?>
            
        </div>
        <div>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <a href="trastienda.php">Trastienda</a>
            <a href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"></a>
        </div>
    </nav>
    <div class="container grid-4">
        <?php
            $DAOProducto = new DAOProducto();
            $products = $DAOProducto->getAllProducts();
            foreach ($products as $product) {
                $tipo = "";
                if($product->getPrecio() < 10){
                    $tipo = "producto de oferta";
                }
                elseif($product->getPrecio() > 200){
                    $tipo = "producto de calidad";
                }
                print ' <a href="product.php?id='.$product->getId().'" class="card">
                            <img src="'.$product->getRuta().'" alt="">
                            <div class="card-text">
                                <div class="card-info">
                                    <p>'.$product->getNombre().'</p>
                                    <p>'.$product->getPrecio().'€</p>
                                </div>
                                <p class="card-type">'.$tipo.'</p>
                            </div>
                        </a>';
            }
        ?>
    </div>
</body>
</html>
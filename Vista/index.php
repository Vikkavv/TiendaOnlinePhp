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
                print '<p class="'.$class.'">¡Bienvenido '.$nombre.' '.$apellido.'! <a class="btn" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a></p>'
            ?>
            
        </div>
        <div>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <?php
                print '<a class="'.$class.'" href="trastienda.php">Trastienda</a>';
            ?>
            <a class="ac" href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"><?php if(isset($_SESSION['cliente'])) if(isset($_SESSION['carrito'])) echo "<p>". count($_SESSION['carrito']). "</p>"; ?></a>
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
                                <div class="card-info">
                                    <p class="card-type" style="width: fit-content;">'.$tipo.' </p>
                                    <div class="btn btn-20">
                                        <img src="Assets/img/carrito.png">
                                    </div>
                                    <div class="btn btn-20 pos">
                                        <form class="btn-carrito" action="carrito.php" method="get">
                                            <input style="display:none;" name="id" value="'.$product->getId().'" hidden>
                                            <input class="carr" type="submit" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>';
            }
        ?>
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
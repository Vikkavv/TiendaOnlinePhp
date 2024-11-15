<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/styles.css">
    <?php
        require_once "../Modelo/DTOCliente.php";
        require_once "../Modelo/DAOProducto.php";
        $DAOProducto = new DAOProducto();
        $product = $DAOProducto->getProductByID($_GET['id']);
    ?>
    <title><?php $product->getNombre(); ?></title>
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
                print '<p class="'.$class.'">¡Bienvenido '.$nombre.' '.$apellido.'! <a class="btn" href="../Controlador/controlPeticionesCliente.php?cliente=true">Cerrar sesión</a></p>';
                $tipo = "";
                if($product->getPrecio() < 10){
                    $tipo = "producto de oferta";
                }
                elseif($product->getPrecio() > 200){
                    $tipo = "producto de calidad";
                }
            ?>
            
        </div>
        <div>
            <a href="index.php">Página Principal</a>
            <a href="inicioSesion.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
            <?php
                print '<a class="'.$class.'" href="trastienda.php">Trastienda</a>';
            ?>
            <a class="ac" href="carrito.php"><img src="Assets/img/carrito.png" alt="icono carrito de la compra"><?php if(isset($_SESSION['cliente'])) if(isset($_SESSION['carrito'])) echo "<p>". count($_SESSION['carrito']). "</p>"; ?></a>
        </div>
    </nav>
    <?php
        print ' <div class="container-10 grid-2 gap10">
                    <img class="prdImg" src="'.$product->getRuta().'">
                    <div>
                        <h1>'.$product->getNombre().'</h1>
                        <p>'.$product->getDescripcion().'</p>
                        <p>'.$product->getPrecio().'€</p>
                        <p style="color: #b8b8b8;" >'.$tipo.'</p>
                        <a class="btn" style="margin: 0;" href="carrito.php?id='.$product->getId().'">Añadir al carrito</a>
                    </div>
                </div>
                ';
    ?>
</body>
</html>
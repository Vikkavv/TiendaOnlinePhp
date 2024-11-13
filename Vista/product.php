<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once "../Modelo/DAOProducto.php";
        require_once "../Modelo/DTOProducto.php";
        $DAOProducto = new DAOProducto();
        $product = $DAOProducto->getProductByID($_GET['id']);
    ?>
    <title><?php $product->getNombre(); ?></title>
</head>
<body>
    <?php
        print '<img src="'.$product->getRuta().'">';
        print "<p>".$product->getNombre()."</p>";
        print "<p>".$product->getDescripcion()."</p>";
        print "<p>".$product->getPrecio()."€</p>";
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PRODUCTOS</h1>
    <table style="border: 1px solid black;">
        <?php
            require_once "../Modelo/DAOProducto.php";
            $DAOProducto = new DAOProducto();
            $products = $DAOProducto->getAllProducts();
            foreach ($products as $key => $product) {
                print '<tr>';
                    print '<td>'. $product->getId() .'</td>';
                    print '<td><a href="product.php?id='. $product->getId() .'">'. $product->getNombre() .'</a></td>';
                    print '<td>'. $product->getDescripcion() .'</td>';
                    print '<td>'. $product->getPrecio() .'</td>';
                    print '<td>'. $product->getClienteId() .'</td>';
                print '</tr>';
            }
        ?>
    </table>
    <a href="añadir-producto.php">Añadir producto</a>
</body>
</html>
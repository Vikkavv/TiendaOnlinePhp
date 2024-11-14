<?php
    require_once "../Modelo/DAOProducto.php";

function mostrarCarrito(){
    foreach ($_SESSION["carrito"] as $producto) {
        print "<tr>";
        print "<td>" . $producto->getId() . "</td>";
        print "<td>" . $producto->getNombre() . "</td>";
        print "<td>" . $producto->getDescripcion() . "</td>";
        print "<td>" . $producto->getPrecio() . "</td>";
        print "<td>" . $producto->getClienteId() . "</td>";
        print "<td>" . $producto->getRuta() . "</td>";
        print "<td><button><a href='carrito.php?idb=".$producto->getId()."'>Borrar producto</a></button></td>";
        print "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito</h1>
    <table style="border: 1px solid black">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cliente Id</th>
            <th>Ruta imagen</th>
        </tr>
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
            }
            else{
                if (count($_SESSION["carrito"]) > 0){
                        mostrarCarrito();
                }
                else{
                    print "<p>El carrito está vacío.</p>";
                }
            }
        ?>
    </table>
</body>
</html>


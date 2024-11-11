<?php

require_once "ControlProducto.php";

$controlProducto = new ControlProducto();

if(isset($_POST['insert'])){
    $product = new DTOProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['cliente_id']);

    $location = "";
    if($controlProducto->checkProductFields($product)){
        $location = "../Vista/mainPage.php";
    }else $location = "../Vista/insertProduct.php";

    header("Location: $location");
    exit;
}
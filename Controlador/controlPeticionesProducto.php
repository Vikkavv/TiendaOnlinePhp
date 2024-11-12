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

if(isset($_POST['update'])){
    $realProduct = $controlProducto->getDAOProducto()->getProductByID($_POST['id']);
    $product = new DTOProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['cliente_id'], $_POST['id']);
    
    if($realProduct != false){
        if(empty($_POST['nombre'])){
            $product->setNombre($realProduct->getNombre());
        }
        if(empty($_POST['descripcion'])){
            $product->setDescripcion($realProduct->getDescripcion());
        }
        if(empty($_POST['precio'])){
            $product->setPrecio($realProduct->getPrecio());
        }
        if(empty($_POST['cliente_id'])){
            $product->setClienteId($realProduct->getClienteId());
        }
    }
    
    $location = "";
    if($controlProducto->checkProductFields($product)){
        $location = "../Vista/mainPage.php";
    }else $location = "../Vista/updateProduct.php";

    header("Location: $location");
    exit;
}
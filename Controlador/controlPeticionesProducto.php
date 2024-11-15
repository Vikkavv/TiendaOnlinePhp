<?php

require_once "../Modelo/DTOCliente.php";
require_once "ControlProducto.php";

$controlProducto = new ControlProducto();

if(isset($_POST['insert'])){
    $product = new DTOProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_SESSION['cliente']->getId());
    $location = "";
    if($controlProducto->checkProductFields($product)){
        $location = "../Vista/gestionProducto.php";
    }else $location = "../Vista/insertProduct.php";

    header("Location: $location");
    exit;
}

if(isset($_POST['update'])){
    $realProduct = $controlProducto->getDAOProducto()->getProductByID($_POST['id']);
    $product = new DTOProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_SESSION['cliente']->getId(), id: $_POST['id']);
    
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
        if(empty($_FILES['ficheroSubida']['name'])){
            $product->setRuta("empty");
        }
    }
    
    $location = "";
    if($controlProducto->checkProductFields($product)){
        $location = "../Vista/gestionProducto.php";
    }else $location = "../Vista/updateProduct.php";

    header("Location: $location");
    exit;
}
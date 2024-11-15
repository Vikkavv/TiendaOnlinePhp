<?php

require_once "../Modelo/DAOProducto.php";
$DAOProducto = new DAOProducto();

if(isset($_GET['id'])){
    $DAOProducto->deleteProduct($_GET['id']);
    $_SESSION['delSuccess'] = $_GET['id'];
}

header("Location: show-DelProducts.php");
exit;
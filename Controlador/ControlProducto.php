<?php

require_once "../Modelo/DAOProducto.php";

class ControlProducto{
    private $DAOProducto;

    public function __construct(){
        $this->DAOProducto = new DAOProducto();
    }

    public function checkProductFields(DTOProducto $producto){
        $return = true;
        $vName = "/[A-Za-z0-9]{5}/i";
        if(preg_match($vName, $producto->getNombre())){
            if($this->DAOProducto->getProductByID($producto->getId()) == $producto->getNombre()){
                $_SESSION['NameAE'] = true;
                $return = false;
            }
        }
        else{
            $_SESSION['NameNotValid'] = true;
            $return = false;
        }
        if($producto->getPrecio() < 0){
            $_SESSION['NegPrice'] = true;
            $return = false;
        }
        $this->DAOProducto->insertProduct($producto);
        return $return;
    }     
}
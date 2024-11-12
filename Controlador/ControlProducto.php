<?php

require_once "../Modelo/DAOProducto.php";

class ControlProducto{
    private $DAOProducto;

    public function __construct(){
        $this->DAOProducto = new DAOProducto();
    }

    public function checkProductFields(DTOProducto $producto){
        $return = true;
        $vName = "/^[A-Za-z0-9]{5,}(( ){1}([A-Za-z0-9]*)?)*(.)?$/";
        if($producto->getId() != null){
            if(!$this->DAOProducto->getProductByID($producto->getId())){
                $_SESSION['IdNotExists'] = true;
                $return = false;
            }
        }
        if(preg_match_all($vName, $producto->getNombre())){
            if($this->DAOProducto->getProductByName($producto->getNombre()) != null && $producto->getId() == null){
                $_SESSION['NameAE'] = true;
                $return = false;
            }
        }
        else{
            $_SESSION['NameNotValid'] = true;
            $return = false;   
        }
        if($producto->getPrecio() < 0){
            if(is_numeric($producto->getPrecio())){
                $_SESSION['NegPrice'] = true;
                $return = false;
            }
        }
        if($return && $producto->getId() == null) $this->DAOProducto->insertProduct($producto);
        elseif($return && $producto->getId() != null) $this->DAOProducto->updateProduct($producto);
        return $return;
    }

    public function getDAOProducto(){
        return $this->DAOProducto;
    }
}
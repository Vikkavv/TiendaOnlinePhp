<?php

require_once "../Modelo/DAOProducto.php";
require_once "ControlSubida.php";

class ControlProducto{
    private $DAOProducto;
    private $controlSubida;

    public function __construct(){
        $this->DAOProducto = new DAOProducto();
        $this->controlSubida = new ControlSubida();
    }

    public function checkProductFields(DTOProducto $producto){
        $return = true;
        $vName = "/^[A-Za-z0-9]+(( ){1}([A-Za-z0-9]*)?)*(.)?$/";
        if($producto->getId() != null){
            if(!$this->DAOProducto->getProductByID($producto->getId())){
                $_SESSION['IdNotExists'] = true;
                $return = false;
            }
        }
        if(preg_match_all($vName, $producto->getNombre()) && strlen($producto->getNombre()) > 4){
            $NonUniqueName = false;
            $products = $this->DAOProducto->getAllProducts();
            foreach ($products as $key => $item) {
                if(($producto->getNombre() == $item->getNombre()) && ($producto->getId() != $item->getId())){
                    $NonUniqueName = true;
                }
            }

            if($producto->getNombre() != $this->DAOProducto->getProductByID($producto->getId())){
                if($this->DAOProducto->getProductByName($producto->getNombre()) != null && $NonUniqueName){
                    $_SESSION['NameAE'] = true;
                    $return = false;
                }
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
        if($return && $producto->getId() == null){
            $ruta = $this->controlSubida->proceso();
            $producto->setRuta($ruta);
            $this->DAOProducto->insertProduct($producto);
        } 
        elseif($return && $producto->getId() != null){
            if($producto->getRuta() == "empty"){
                $producto->setRuta($this->DAOProducto->getProductByID($producto->getId())->getRuta());
            }else{
                $ruta = $this->controlSubida->proceso();
                if($ruta == '-1') $ruta = $this->controlSubida->getRutaCompleta();
                $producto->setRuta($ruta);
            }
            $this->DAOProducto->updateProduct($producto);
        }
        return $return;
    }

    public function getDAOProducto(){
        return $this->DAOProducto;
    }
}
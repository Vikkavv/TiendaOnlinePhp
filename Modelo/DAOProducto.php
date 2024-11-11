<?php

require_once "db.php";
require_once "DTOProducto.php";

class DAOProducto{
    private $conn;

    public function __construct(){
        $this->conn = DB::getConnection();
    }

    public function getProductByID($id){
        $product = null;
        $sql = "select * from Producto where id= ".$id;
        $productInfo = $this->conn->query($sql);
        if($productInfo->rowCount() > 0){
            while ($row = $productInfo->fetch(PDO::FETCH_ASSOC)){
                $product = new DTOProducto($row['nombre'],$row['descripcion'], $row['precio'], $row['cliente_id'], $row['id']);
            }
            return $product;
        }
        else return false;
    }

    public function getAllProducts(){
        $products = [];
        $sql = "select * from Producto";
        $select = $this->conn->query($sql);
        if($select->rowCount() > 0){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $products[] = new DTOProducto( $row['nombre'], $row['descripcion'], $row['precio'], $row['cliente_id'], $row['id']);
            }
        }
        return $products;
    }


    public function insertProduct($product){
        $stmt = $this->conn->prepare("insert into Producto (nombre, descripcion, precio, cliente_id) values (:nombre, :descripcion, :precio, :cliente_id)");
        $stmt->bindParam(":nombre", $product->getNombre());
        $stmt->bindParam(":descripcion", $product->getDescripcion());
        $stmt->bindParam(":precio", $product->getPrecio());
        $stmt->bindParam(":cliente_id", $product->getClienteId());
        $stmt->execute();
    }    
}
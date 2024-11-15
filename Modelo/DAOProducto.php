<?php

require_once "DTOProducto.php";
require_once "db.php";

class DAOProducto{
    private $conn;

    public function __construct(){
        $this->conn = DB::getConnection();
    }

    public function getProductByID($id){
        if(!(is_numeric($id))){
            $_SESSION['IdNAN'] = true; 
            return false;
        }
        $product = null;
        $sql = "select * from Producto where id= ".$id;
        $productInfo = $this->conn->query($sql);
        if($productInfo->rowCount() > 0){
            while ($row = $productInfo->fetch(PDO::FETCH_ASSOC)){
                $product = new DTOProducto($row['nombre'],$row['descripcion'], $row['precio'], $row['cliente_id'], ruta: $row['fotoRuta'],id: $row['id']);
            }
            return $product;
        }
        else return false;
    }

    public function getProductByName($name){
        $product = null;
        $products = $this->getAllProducts();
        foreach ($products as $key => $item) {
            if($item->getNombre() == $name) $product = $item;
        }
        return $product;
    }

    public function getAllProducts(){
        $products = [];
        $sql = "select * from Producto";
        $select = $this->conn->query($sql);
        if($select->rowCount() > 0){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $products[] = new DTOProducto( $row['nombre'], $row['descripcion'], $row['precio'], $row['cliente_id'], ruta: $row['fotoRuta'],id: $row['id']);
            }
        }
        return $products;
    }


    public function insertProduct($product){
        $nombre = $product->getNombre();
        $descripcion = $product->getDescripcion();
        $precio = $product->getPrecio();
        $cliente_id = $product->getClienteId(); 
        $ruta = $product->getRuta();
        $stmt = $this->conn->prepare("insert into Producto (nombre, descripcion, precio, cliente_id, fotoRuta) values (:nombre, :descripcion, :precio, :cliente_id, :fotoRuta)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":fotoRuta", $ruta);
        return $stmt->execute();
    }

    public function updateProduct($product){
        $id = $product->getId();
        $nombre = $product->getNombre();
        $descripcion = $product->getDescripcion();
        $precio = $product->getPrecio();
        $cliente_id = $product->getClienteId(); 
        $ruta = $product->getRuta();
        $stmt = $this->conn->prepare("update Producto set nombre = :nombre, descripcion = :descripcion, precio = :precio, cliente_id = :cliente_id, fotoRuta = :fotoRuta where id = :id");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":fotoRuta", $ruta);
        return $stmt->execute();
    }

    public function deleteProduct($id){
        $stmt = $this->conn->prepare("delete from Producto where id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
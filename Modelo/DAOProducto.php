<?php

require_once "db.php";
require_once "DTOProducto.php";

class DAOProducto{
    private $conn;

    public function __construct(){
        $this->conn = DB::getConnection();
    }

    public function getAllProducts(){
        $products = [];
        $sql = "select * from Producto";
        $select = $this->conn->query($sql);
        if($select->rowCount() > 0){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $products[] = new DTOProducto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'], $row['cliente_id']);
            }
        }
        return $products;
    }
}
<?php

class DTOProducto{

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cliente_id;

    public function __construct($id,  $nombre,  $descripcion,  $precio,  $cliente_id){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cliente_id = $cliente_id;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getClienteId(){
        return $this->cliente_id;
    }

    public function setId($id): void{
        $this->id = $id;
    }

    public function setNombre($nombre): void{
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void{
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio): void{
        $this->precio = $precio;
    }

    public function setClienteId($cliente_id): void{
        $this->cliente_id = $cliente_id;
    }
}

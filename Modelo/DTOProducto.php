<?php

class DTOProducto{

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cliente_id;
    private $ruta;
    public function __construct(String $nombre,  $descripcion,  $precio,  $cliente_id, $ruta = null,$id = null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cliente_id = $cliente_id;
        $this->ruta = $ruta;
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

    public function getRuta(){
        return $this->ruta;
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

    public function setRuta($ruta){
        $this->ruta = $ruta;
    }
}

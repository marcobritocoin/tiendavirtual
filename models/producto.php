<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
            
    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    
    public function getAllCategory(){           
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
                ."INNER JOIN categorias c ON c.id = p.categoria_id "
                ."WHERE p.categoria_id = {$this->getCategoria_id()} "
                ."ORDER BY id DESC";
        $productos = $this->db->query($sql);    
        return $productos;       
    }
    
    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;   
    }


    public function getOne(){
        $productos = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }
    
    public function guardar(){  
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', '{$this->getOferta()}', '{$this->getFecha()}', '{$this->getImagen()}')";
        $guardar = $this->db->query($sql); 
        
        $result = false;
        if($guardar){
            $result = true;
        }
        
        return $result;
    }
    
    public function editar(){
        
        $sql = "UPDATE productos SET categoria_id='{$this->getCategoria_id()}', nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio='{$this->getPrecio()}', stock='{$this->getStock()}', oferta='{$this->getOferta()}', fecha='{$this->getFecha()}'";
        
        if($this->getImagen() != null){
            $sql .= ", imagen='{$this->getImagen()}'";
        }
      
        $sql .= " WHERE id={$this->getId()};";
   
        $guardar = $this->db->query($sql); 
        
        $result = false;
        if($guardar){
            $result = true;
        }
        
        return $result;
    }
    
    public function eliminar(){
        
        $sql = "DELETE FROM productos WHERE id = '{$this->getId()}'";
        $borrar = $this->db->query($sql); 
        
        $result = false;
        if($borrar ){
            $result = true;
        }
        
        return $result; 
    }
}

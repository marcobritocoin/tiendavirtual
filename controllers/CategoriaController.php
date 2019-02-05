<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriacontroller{
    
    public function index(){
        Utils::isAdmin(); // verifico si es administrador
        $categoria = new Categoria();
        $categorias = $categoria->getAll(); 
        
        require_once 'views/categoria/index.php';
    }
    
    public function ver(){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            // Conseguir Categoria
            $categorias = new Categoria();
            $categorias->setId($id);
            $categoria = $categorias->getOne();
            
            // Conseguir Productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();       
        }
        
        require_once 'views/categoria/ver.php';
        
    }


    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function guardar(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
           //Guardar la categoria en BD
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']); 
            $guardar = $categoria->guardar();
            
             if($guardar){
                $_SESSION['register']="complete";
             }else{
                $_SESSION['register']="failed";
             }  
        }
        
        header("Location:".base_url."categoria/index");
    }
}


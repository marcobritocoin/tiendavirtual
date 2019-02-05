<?php
require_once 'models/producto.php';

class productocontroller{
    
    public function index(){
        
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        
        //renderizar vista
        require_once 'views/producto/destacados.php';
        
    }
    
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $producto = new Producto();
            $producto->setId($id);
            
            // sacamos un registro de la base de datos 
            $pro = $producto->getOne();

        }
        require_once 'views/producto/ver.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }
    
    public function crear(){
        Utils::isAdmin();   
        require_once 'views/producto/crear.php';  
    }
    
    public function guardar(){
        
        if(isset($_POST)){
            
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            
            if($nombre && $descripcion && $precio && $stock && $categoria){
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                //Guardar la fecha en el momento
                $fecha = date("Y-m-d");
                $producto->setFecha($fecha);

                // Guardar la imagen
                if(isset($_FILES['imagen'])){
                    //Guardar la imagen
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    $dir = 'uploads/images';

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                        if(!is_dir($dir)){
                            mkdir($dir, 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], $dir.'/'.$filename);
                        $producto->setImagen($filename);     
                    }
                }
                
                if(isset($_GET['id'])){
                   $id=$_GET['id'];
                   $producto->setId($id);
                   $save = $producto->editar();
                }else{
                   $save = $producto->guardar(); 
                }
                
                

                if($save){
                    $_SESSION['register']="complete";
                }else{
                    $_SESSION['register']="failed";
                }  
            }else{
               $_SESSION['register']="failed"; 
            }
        }else{
            $_SESSION['register']="failed";
        }
        
        header("Location:".base_url."producto/gestion");
        
    }
    
    public function editar(){
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;
            
            $producto = new Producto();
            $producto->setId($id);
            
            // sacamos un registro de la base de datos 
            $pro = $producto->getOne();
        
            require_once 'views/producto/crear.php';
        
        }else{
            header("Location:".base_url."producto/gestion");   
        }
    }
    
    public function eliminar(){
        // eliminar productos
        //var_dump($_GET);
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $producto = new Producto();
            $producto->setId($_GET['id']);
            
            $delete = $producto->eliminar();
            
            if($delete){
                    $_SESSION['delete']="complete";
                }else{
                    $_SESSION['delete']="failed";
            } 
        }else{
           $_SESSION['delete']="failed"; 
        }
    
        header("Location:".base_url."producto/gestion");
    }
    
}

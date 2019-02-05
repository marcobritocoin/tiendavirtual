<?php

require_once 'models/producto.php';

class carritocontroller {

    public function index() {
        
        if(isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }
      
        require_once 'views/carrito/index.php';
    }

    public function agregar() {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        if (isset($_SESSION['carrito'])){
            $cont=0;
            foreach ($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $cont++;
                }
            } 
        } 
        
        if(!isset($cont) || $cont == 0){
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $productor = $producto->getOne(); 

            if (is_object($productor)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $productor->id,
                    "precio" => $productor->precio,
                    "unidades" => 1,
                    "producto" => $productor
                );
            } 
        }
 
        header("Location:".base_url."carrito/index");
    }

    public function remover() {
        echo "Controlador remover carrito, accion index";
    }

    public function eliminar() {
        echo "Controlador eliminar carrito, accion index";
    }
    
    public function eliminarAll() {
        unset($_SESSION['carrito']);
        header("Location:".base_url);
        //header("Location:".base_url."carrito/index");
    }

}

<?php

// CLASE DE UTILIDADES

class Utils{
    
    // Borrar una sesion en especifico
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
             unset($_SESSION[$name]);
        }
        return $name;
    }
    
    // verificar si es administrador
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
    
    // muestra todas las categorias
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    
    // imprimir estadisticas de carrito
    public static function statsCarrito(){
        $stats = array(
          'count' => 0,
          'total' => 0
        );
        
        if(isset($_SESSION['carrito'])){
           
            // total de productos
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach ($_SESSION['carrito'] as $producto){
                // precio total
                $stats['total'] += $producto['precio']*$producto['unidades'];
            }
            
        }
        
        return $stats;
    }
    
}

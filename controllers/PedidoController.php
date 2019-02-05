<?php

require_once 'models/pedido.php';

class pedidocontroller{
    
    public function index(){
        echo "Controlador pedido, accion index";
    }
    
    public function hacer(){
        
        require_once 'views/pedido/hacer.php';
    }
    
    public function agregar(){
        if(isset($_SESSION['identity'])){
            
            
            //guardar pedido
            $pedido = new Pedido();
            $pedido->setProvincia($provincia);
            
        }else{
            //redirigir 
            header("Location:".base_url);
        }
    }
    
}


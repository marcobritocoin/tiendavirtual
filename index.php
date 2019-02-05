<?php
session_start();
require_once 'autoload.php';             // Cargo todas las clases
require_once 'config/db.php';            // Cargo la base de datos
require_once 'config/parameters.php';    // Defino las constantes
require_once 'helpers/utils.php';        // Cargo las utilidades
require_once 'views/layout/header.php';  // Cabecera de la plantilla
require_once 'views/layout/sidebar.php'; // Sidebar de la plantilla


// Muestro el error
function show_error(){
    $error = new errorController();
    $error->index();
}

// Controlador Frontal (CONTROL DE CONTENIDO)
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}else if(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default; // accedo a la constante de controlador definida en parameters
}else{
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action=$_GET['action'];
        $controlador->$action();
    }else if(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default; // accedo a la constante de action definida en parameters
        $controlador->$action_default();
    }else{
        show_error();
    }  
}else{
    show_error();
}

require_once 'views/layout/footer.php';  // Footer de la plantilla


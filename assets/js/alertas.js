function alertaEliminar(id, prod){
    var opcion = confirm("¿Desea eliminar el producto "+prod+"?");
    if (opcion) {
        window.location.href = "<?=base_url?>producto/eliminar&id="+id;  
    }
}
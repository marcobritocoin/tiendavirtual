<h1>Gestion de Productos</h1>

<?php //Mensaje Flash de respuesta de registro ?>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">Registro correcto de producto</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
<strong class="alert_red">Falló el registro de producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>

<?php //Mensaje Flash de respuesta de registro ?>
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
<strong class="alert_green">Producto eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
<strong class="alert_red">Falló al eliminar producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>
<table>
    <tr>
        <th>ID</th>
        <th></th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
<?php while($prod = $productos->fetch_object()): ?>
     <tr>
        <td><?=$prod->id;?></td>
        <?php if($prod->imagen != null): ?>
            <td><img class="thumbGestion" src="<?=base_url?>/uploads/images/<?=$prod->imagen?>" /></td>
        <?php else: ?>
            <td><img class="thumbGestion" src="<?=base_url?>uploads/images/camiseta.png" /></td>
        <?php endif; ?>
        <td><?=$prod->nombre;?></td>
        <td><?=$prod->precio;?></td>
        <td><?=$prod->stock;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
            <a href="#" class="button button-gestion button-red" onclick="alertaEliminar(<?=$prod->id?>, '<?=$prod->nombre;?>')">Eliminar</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>

<!-- SACAR ESTE CODIGO DE AQUI -->
<script type="text/javascript">
function alertaEliminar(id, prod){
    var opcion = confirm("¿Desea eliminar el producto "+prod+"?");
    if (opcion) {
        window.location.href = "<?=base_url?>producto/eliminar&id="+id;  
    }
}
</script>


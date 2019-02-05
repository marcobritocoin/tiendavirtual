<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categoria/guardar" method="POST">
    <label>Nombre</label>
    <input type="text" name="nombre" required/>
    
    <input type="submit" value="Guardar" />

</form>
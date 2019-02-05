<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer Pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver productos</a>
    </p>
    
    <h3>Dirección para el envío:</h3>
    <form action="<?=base_url?>pedido/agregar" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required/>
        
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" required/>
        
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required/>
        
        <input type="submit" value="Confirmar pedido" />

    </form>
    
<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Logueate en el panel del lado izquierdo.</p>
<?php endif; ?>


<h1>Carrito de Compra</h1>


<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

    <?php
    foreach ($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
        //var_dump($producto);
        ?>
        <tr>
            <td>
                <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>">
                    <?php if ($producto->imagen != null): ?>
                        <img class="img_carrito" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" />
                    <?php else: ?>
                        <img class="img_carrito" src="<?= base_url ?>uploads/images/camiseta.png" />
                    <?php endif; ?>
                </a>
            </td>
            <td>
                <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>">
                    <?= $producto->nombre ?>
                </a>
            </td>
            <td>
                <?= $producto->precio ?>
            </td>
            <td>
                <?= $elemento['unidades'] ?>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br/>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio total: <?= $stats['total'] ?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer Pedido</a>
</div>

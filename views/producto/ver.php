<?php if (isset($pro)): ?>
    <h1><b><?= $pro->nombre ?></b></h1>
    <div id="detail-product">
        <div class="image">
        <?php if ($pro->imagen != null): ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" />
        <?php else: ?>
            <img src="<?= base_url ?>uploads/images/camiseta.png" />
        <?php endif; ?>
        </div>
        <div class="data">
        <p class="description"><?= $pro->descripcion ?></p> 
        <p class="price"><?= $pro->precio ?></p>
        <a href="<?=base_url?>carrito/agregar&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
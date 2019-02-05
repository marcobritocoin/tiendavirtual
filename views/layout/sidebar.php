  
            <!-- BARRA LATERAL -->
            <aside id="lateral">
                
                <div id="carrito" class="block_aside">
                    <h3>Mi carrito</h3>
                    <ul>
                        <?php $stats = Utils::statsCarrito(); ?>
                        <li><a href="<?=base_url?>carrito/index">Productos (<?=$stats['count']?>)</a></li>
                        <li><a href="<?=base_url?>carrito/index">Total a pagar (<?=$stats['total']?>)</a></li>
                        <li><a href="<?=base_url?>carrito/index">Ver Carrito</a></li>
                    </ul>
                </div>
                
                
                
                <div id="login" class="block_aside">
                    <?php if(!isset($_SESSION['identity'])): ?>
                    <h3>Entrar a la web</h3>
                    <form action="<?=base_url?>usuario/login" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" /> 
                        <input type="submit" value="Enviar" />
                    </form>
                    <ul>
                         <li><a href="<?=base_url?>usuario/registro">Registrate</a></li>
                    </ul> 
                    <?php else: ?>
                    <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
                    <ul>
                         
                         <?php if(isset($_SESSION['admin'])): ?>
                            <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
                            <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
                            <li><a href="#">Gestionar pedidos</a></li>
                            
                         <?php else: ?>
                             <li><a href="#">Mis pedidos</a></li>
                         <?php endif; ?>
                             
                            <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
                    </ul>   
                    <?php endif; ?>
                </div>
            </aside>
        
        
            <!-- CONTENIDO CENTRAL -->
            <div id="central">

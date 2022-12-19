<?php require_once 'includes/header.php' ?>

    <div id="container">
        <!-- SIDEBAR -->
        <?php require_once 'includes/aside.php' ?>

        <!-- MAIN -->
        <div id="main">
            <h1 class="main__title">Ultimas entradas</h1>

            <?php 
                $entradas =  obtenerUltimasEntradas($db);
                if( !empty($entradas) ):
                    while( $entrada = mysqli_fetch_assoc($entradas) ):
            ?>
                        <article class="entrada">
                            <a href="">
                                <h2 class="main__subtitle"><?=$entrada['titulo']?></h2>
                                <span class="fecha"><?= $entrada['categoria'].' | '.$entrada['fecha']; ?></span>
                                <p class="main__description">
                                    <?= substr($entrada['descripcion'], 0, 180)."..." ?>
                                </p>
                            </a>
                        </article>
            <?php
                    endwhile;
                endif;
            ?>
            
            <div id="vertodas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php' ?>
</body>
</html>
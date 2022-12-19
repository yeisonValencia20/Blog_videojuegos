<?php require_once 'includes/comprobar_sesion.php'; ?>
<?php require_once 'includes/header.php'; ?>

<div id="container">
    <!-- ASIDE -->
    <?php require_once 'includes/aside.php'; ?>

    <!-- MAIN -->
    <div id="main">
        <h1 class="main__title">Crear entradas</h1>
        <p class="agregarEntrada__text">Añade una nueva entrada al blog para que los usuarios puedan leerlas en el inicio de la pagina.</p>
        <form action="guardar_entrada.php" method="POST">
            <label class="agregarEntrada__form" for="titulo_entrada">Título entrada: </label>
            <input class="agregarEntrada__form" type="text" name="titulo_entrada">
            <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo_entrada') : ''; ?>

            <label class="agregarEntrada__form" for="descripcion_entrada">Descripcion entrada: </label>
            <textarea class="agregarEntrada__form" name="descripcion_entrada" ></textarea>
            <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion_entrada') : ''; ?>
            
            <label class="agregarEntrada__form" for="categoria_entrada">Categoria entrada: </label>
            <select name="categoria_entrada" >
                <?php  
                    $categorias = obtenerCategorias($db);
                    if( !empty($categorias) ):
                        while( $categoria = mysqli_fetch_assoc($categorias) ):
                ?>
                            <option value="<?=$categoria['id']; ?>">
                                <?=$categoria['nombre']; ?>
                            </option>
                <?php 
                        endwhile;
                    endif;
                ?>
            </select>
            <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria_entrada') : ''; ?>

            <input class="agregarEntrada__form" type="submit" value="Guardar">
        </form>
    </div>
    <?php borrarErrores(); ?>
</div>

<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?>
</body>
</html>
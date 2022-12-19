<?php require_once 'includes/comprobar_sesion.php'; ?>
<?php require_once 'includes/header.php'; ?>

<div id="container">
    <!-- ASIDE -->
    <?php require_once 'includes/aside.php'; ?>

    <!-- MAIN -->
    <div id="main">
        <h1 class="main__title">Crear categorias</h1>
        <p class="agregarCategoria__text">Añade una nueva categoría al blog para que los usuarios puedan usarlas al crear sus entradas.</p>
        <form action="guardar_categoria.php" method="POST">
            <label class="agregarCategoria__form" for="nombre_categoria">Nombre Categoría: </label>
            <input class="agregarCategoria__form" type="text" name="nombre_categoria">
            <input class="agregarCategoria__form" type="submit" value="Guardar">
        </form>
    </div>
</div>

<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?>
</body>
</html>
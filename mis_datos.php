<?php require_once 'includes/comprobar_sesion.php'; ?>
<?php require_once 'includes/header.php'; ?>

<div id="container">
    <!-- ASIDE -->
    <?php require_once 'includes/aside.php'; ?>

    <!-- MAIN -->
    <div id="main">
        <h1 class="main__title">Mis datos</h1>
        <?php if( isset($_SESSION['completado']) ): ?>
            <div class="alerta alerta-exito">
                <?=$_SESSION['completado'] ?>
            </div>
        <?php elseif( isset($_SESSION['errores']['general']) ): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['completado']['general'] ?>
            </div>
        <?php endif; ?>
        
        <form action="actualizar_usuario.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email" value="<?=$_SESSION['usuario']['email']?>">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <input type="submit" name="submit" value="Actualizar">
        </form>
        <?php borrarErrores(); ?>
    </div>
</div>

<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?>
</body>
</html>
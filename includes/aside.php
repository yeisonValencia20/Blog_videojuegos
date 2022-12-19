<!-- SIDEBAR -->
<aside id="sidebar">

    <?php if( isset($_SESSION['usuario']) ): ?>
        <div id="usuario-logueado" class="sideblock">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
            <a href="crear_entradas.php" class="boton boton-verde">Crear entradas</a>
            <a href="crear_categoria.php" class="boton boton">Crear categoria</a>
            <a href="mis_datos.php" class="boton boton-naranja">Mis datos</a>
            <a href="cerrar_sesion.php" class="boton boton-rojo">Cerrar sesión</a>
        </div>
    <?php endif; ?>
    
    <?php if( !isset($_SESSION['usuario']) ): ?>
        <div id="login" class="sideblock">
            <h3 class="sideblock__title">Ingresar</h3>

            <?php if( isset($_SESSION['error_login']) ): ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login']; ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password">

                <input type="submit" value="Ingresar">
            </form>
        </div>

        <div id="register" class="sideblock">
            <h3 class="sideblock__title">Registrarse</h3>
            <?php if( isset($_SESSION['completado']) ): ?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['completado'] ?>
                </div>
            <?php elseif( isset($_SESSION['errores']['general']) ): ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['completado']['general'] ?>
                </div>
            <?php endif; ?>
            
            <form action="register.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email</label>
                <input type="email" name="email">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" name="submit" value="Registrar">
            </form>
            <?php borrarErrores(); ?>
        </div>
    <?php endif; ?>
</aside>
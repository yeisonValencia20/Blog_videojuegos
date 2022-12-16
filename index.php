<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de videojuegos</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <!-- CABECERA -->
    <header id="header">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php" class="logo__text">
                Blog de Videojuegos
            </a>
        </div>

        <!-- MENU -->
        <nav id="nav">
            <ul class="nav__list">
                <li>
                    <a href="index.php" class="nav__link">Inicio</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Categoria 1</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Categoria 2</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Categoria 3</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Categoria 4</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Sobre mí</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="container">
        <!-- SIDEBAR -->
        <aside id="sidebar">
            <div id="login" class="sideblock">
                <h3>Ingresar</h3>
                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Ingresar">
                </form>
            </div>

            <div id="register" class="sideblock">
                <h3>Registrarse</h3>
                <form action="register.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos">

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Registrar">
                </form>
            </div>
        </aside>

        <!-- MAIN -->
        <div id="main">
            <h1 class="main__title">Ultimas entradas</h1>
            <article class="entrada">
                <a href="">
                    <h2 class="main__subtitle">Titulo de mi entrada</h2>
                    <p class="main__description">
                        Descripcion de la entrada
                    </p>
                </a>
            </article>
            
            <article class="entrada">
                <a href="">
                    <h2 class="main__subtitle">Titulo de mi entrada</h2>
                    <p class="main__description">
                        Descripcion de la entrada
                    </p>
                </a>
            </article>

            <article class="entrada">
                <a href="">
                    <h2 class="main__subtitle">Titulo de mi entrada</h2>
                    <p class="main__description">
                        Descripcion de la entrada
                    </p>
                </a>
            </article>

            <article class="entrada">
                <a href="">
                    <h2 class="main__subtitle">Titulo de mi entrada</h2>
                    <p class="main__description">
                        Descripcion de la entrada
                    </p>
                </a>
            </article>

            <div id="vertodas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="footer">
        <p>Desarrollado por Yeison Valencia &copy; 2022</p>
    </footer>
</body>
</html>
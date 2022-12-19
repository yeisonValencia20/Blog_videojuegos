<?php require_once 'conexion.php'?>
<?php require_once 'includes/helpers.php'; ?>

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
                <?php 
                    $categorias =  obtenerCategorias($db);
                    if( !empty($categorias) ):
                        while( $categoria = mysqli_fetch_assoc($categorias) ): 
                ?>
                            <li>
                                <a href="categoria.php?id=<?=$categoria['id']?>" class="nav__link"><?=$categoria['nombre']?></a>
                            </li>
                <?php 
                        endwhile;
                    endif; 
                ?>
                <li>
                    <a href="index.php" class="nav__link">Sobre mí</a>
                </li>
                <li>
                    <a href="index.php" class="nav__link">Contacto</a>
                </li>
            </ul>
        </nav>
    </header>
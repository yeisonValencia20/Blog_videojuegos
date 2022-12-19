<?php 
if( isset($_POST) ){
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo_entrada']) ? mysqli_real_escape_string($db, $_POST['titulo_entrada']) : false;
    $descripcion = isset($_POST['descripcion_entrada']) ? mysqli_real_escape_string($db, $_POST['descripcion_entrada']) : false;
    $categoria = isset($_POST['categoria_entrada']) ? (int)$_POST['categoria_entrada'] : false;
    $usuarioId = $_SESSION['usuario']['id'];

    // Validar campos antes de agregarlos a la base de datos
    //// Array de errores
    $errores = [];
     //// validar campo nombre
    if( empty($titulo) ){
        $errores['titulo_entrada'] = 'El titulo no es valido';
    }
    
    if( empty($descripcion) ){
        $errores['descripcion_entrada'] = 'La descripcion no es valida';
    }

    if( empty($categoria) || !is_numeric($categoria) ){
        $errores['categoria_entrada'] = 'La categoria no es valida';
    }

    if( !count($errores) ){
        $sql = "INSERT INTO entradas VALUES (NULL, $usuarioId, $categoria, '$titulo', '$descripcion', CURDATE());";
        $guardar = mysqli_query($db, $sql);
        header("Location: index.php");
    }else {
        $_SESSION['errores_entradas'] = $errores;
        header("Location: crear_entradas.php");
    }
}
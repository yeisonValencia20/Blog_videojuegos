<?php 
if( isset($_POST) ){
    //conexion a la base de datos
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre_categoria']) ? mysqli_real_escape_string($db, $_POST['nombre_categoria']) : false;

    // Validar campos antes de agregarlos a la base de datos
    //// Array de errores
    $errores = [];
     //// validar campo nombre
    if( !empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
    else{
        $errores['nombre_categoria'] = 'El nombre no es valido';
    }
}

header("Location: index.php");
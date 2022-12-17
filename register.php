<?php 

if( isset($_POST) ){

    require_once 'includes/conexion.php';
    
    if( !isset($_SESSION) ){
        session_start();
    }

    // obtener datos 
    $nombre    = isset($_POST['nombre'])    ? mysqli_real_escape_string($db, $_POST['nombre'])     : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos'])  : false;
    $email     = isset($_POST['email'])     ? mysqli_real_escape_string($db, $_POST['email'])      : false;
    $password  = isset($_POST['password'])  ? mysqli_real_escape_string($db, $_POST['password'])   : false;

    // validar campos 
    //// array de errores
    $errores = [];
    if( empty($nombre) || is_numeric($nombre) || preg_match('/[0-9]/', $nombre) ){
        $errores['nombre'] = 'Nombre no valido';
    }

    if( empty($apellidos) || is_numeric($apellidos) || preg_match('/[0-9]/', $apellidos) ){
        $errores['apellidos'] = 'Apellidos no valido';
    }

    if( empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $errores['email'] = 'Email no valido';
    }

    if( empty($password) ){
        $errores['password'] = 'Ingrese una contraseña';
    }
    
    //// si hay errores guardarlos en la sesion y redireccionar al inicio
    if( count($errores) ){
        $_SESSION['errores'] = $errores;
        header('Location: index.php');
        die();
    }

    // INSERTAR DATOS EN LA BASE DE DATOS
    //// cifrar contraseña
    $password_hashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

    //// sql
    $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellidos', '$email', '$password_hashed', CURDATE())";
    $guardar = mysqli_query($db, $sql);

    if($guardar){
        $_SESSION['completado'] = 'El registro se ha completado con exito';
    }
    else {
        $_SESSION['errores']['general'] = 'Fallo al guardar el usuario!!';
    }
}

header('Location: index.php');
<?php 

if( isset($_POST) ){

    require_once 'includes/conexion.php';
    
    if( !isset($_SESSION) ){
        session_start();
    }

    // obtener datos
    $nombre    = isset($_POST['nombre'])    ? mysqli_real_escape_string($db, $_POST['nombre'])      : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos'])   : false;
    $email     = isset($_POST['email'])     ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $usuarioId = $_SESSION['usuario']['id'];
    // validar campos 
    //// array de errores
    $errores = [];
    if( !empty($nombre) ){
        if( is_numeric($nombre) || preg_match('/[0-9]/', $nombre) ){
            $errores['nombre'] = 'Nombre no valido';
        }
    }

    if( !empty($apellidos) ){
        if( is_numeric($apellidos) || preg_match('/[0-9]/', $apellidos) ){
            $errores['apellidos'] = 'Apellidos no valido';
        }
    }

    if( !empty($email) ){
        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            $errores['email'] = 'Email no valido';
        }
    }
    
    // comprobar si el email ya existe
    $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
    $isset_user = mysqli_fetch_assoc( mysqli_query($db, $sql) );
    if( $isset_user['id'] != $usuarioId && !empty($isset_user) ){
        $errores['email'] = 'Este email ya se encuentra registrado!!';
    }

    //// si hay errores guardarlos en la sesion y redireccionar al inicio
    if( count($errores) ){
        $_SESSION['errores'] = $errores;
        header('Location: mis_datos.php');
        die();
    }

    // ACTUALIZAR DATOS EN LA BASE DE DATOS
    //// sql
    $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = '$usuarioId'";
    $guardar = mysqli_query($db, $sql);

    if($guardar){
        $_SESSION['usuario']['nombre'] =  $nombre;
        $_SESSION['usuario']['apellidos'] =  $apellidos;
        $_SESSION['usuario']['email'] =  $email;

        $_SESSION['completado'] = 'La actualizacion del usuario se ha completado con exito';
    }
    else {
        $_SESSION['errores']['general'] = 'Fallo al actualizar el usuario!!';
    }
}

header('Location: mis_datos.php');
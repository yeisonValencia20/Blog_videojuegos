<?php

// Iniciar la sesion y la conexion a db
require_once 'includes/conexion.php';

// Recoger datos del formualrio
if( isset($_POST) ){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);

        // Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            // Utilizar la sesion para guardar los datos del usuario logueado
            $_SESSION['usuario'] = $usuario;

            if( isset($_SESSION['error_login']) ){
                unset($_SESSION['error_login']);
            }
        }
        else {
            $_SESSION['error_login'] = 'Login incorrecto!!';
        }
    }
    else {
        $_SESSION['error_login'] = 'Login incorrecto!!';
    }
}

// Redirigir
header('Location: index.php');
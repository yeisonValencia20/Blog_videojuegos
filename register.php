<?php 
    session_start();

    if( isset($_POST) ){

        // obtener datos 
        $nombre    = isset($_POST['nombre'])    ? $_POST['nombre']    : false;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $email     = isset($_POST['email'])     ? $_POST['email']     : false;
        $password  = isset($_POST['password'])  ? $_POST['password']  : false;
    
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
        
        if( !count($errores) ){
            // INSERTAR EN LA BASE DE DATOS
        }
        else {
            $_SESSION['errores'] = $errores;
            header('Location: index.php');
        }
    }
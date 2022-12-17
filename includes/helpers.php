<?php

function mostrarError($errores, $campo) {
    
    $error = '';
    if( isset($errores[$campo]) && !empty($campo) ){
        $error = "<div class='alerta alerta-error'>".$errores[$campo]."</div>"; 
    }

    return $error;
}

function borrarErrores(){

    if( isset($_SESSION['errores']) ){
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }

    if( isset($_SESSION['completado']) ){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
}

?>
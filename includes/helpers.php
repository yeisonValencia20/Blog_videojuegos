<?php

function mostrarError($errores, $campo) {
    
    $error = '';
    if( isset($errores[$campo]) && !empty($campo) ){
        $error = "<div class='alerta alerta-error'>".$errores[$campo]."</div>"; 
    }

    return $error;
}

function borrarErrores() {

    if( isset($_SESSION['errores']) ){
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }

    if( isset($_SESSION['errores_entradas']) ){
        $_SESSION['errores_entradas'] = null;
        unset($_SESSION['errores_entradas']);
    }

    if( isset($_SESSION['completado']) ){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
}

function obtenerCategorias($conexion) {
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);

    $result = [];
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }

    return $result;
}

function obtenerUltimasEntradas($conexion) {
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
    "INNER JOIN categorias c ON e.categoria_id = c.id ".
    "ORDER BY e.id DESC LIMIT 4";

    $entradas = mysqli_query($conexion, $sql);

    $result = [];
    if( $entradas && mysqli_num_rows($entradas) >= 1){
        $result = $entradas;      
    }

    return $result;
}

?>
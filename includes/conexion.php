<?php
    session_start();
    
    // conexion
    $server = 'localhost';
    $username = 'root';
    $password = '9810';
    $database = 'blog_master';
    $db = mysqli_connect($server, $username, $password, $database);

    mysqli_query($db, "SET NAMES 'utf8'");
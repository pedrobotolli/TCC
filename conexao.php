<?php 

    $servidor = "127.0.0.1";
    $usuario = "pedrobotolli";
    $senha = "";
    $banco = "banco";
    $porta = '3306';

    $mysqli = new mysqli($servidor, $usuario, $senha, $banco,$porta);
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    /*
    $servidor = 'IP';
    $usuario = 'root';
    $senha = 'root';
    $banco = 'tcc';
    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    */
?>

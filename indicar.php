<?php
    session_start();
    include 'conexao.php';
    $cliente = $_SESSION['CPF'];
    $prestador =  $_SESSION['CPF_PREST'];
    $cod = uniqid();
    $in = "insert into indicacao values ('$prestador','$cliente','$cod')";
    if($resultado = $mysqli->query($in)==true or die ($mysqli->error)){
        echo "indicação feita com sucesso";
    }else{
        echo "indicação não conseguiu ser realizada";
    }
    ?>
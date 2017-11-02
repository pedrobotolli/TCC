<?php
    session_start();
    include 'conexao.php';
    $cliente = $_SESSION['CPF'];
    $prestador =  $_SESSION['CPF_PREST'];
    $c = "select MAX(cd_indicacao) from indicacao";
    $cr = $mysqli->query("select MAX(cd_indicacao) from indicacao")==true or die ($mysqli->error);
    echo $cr;
    echo "  ";
    $cod = $cr + 1;
    echo $cod;
    $in = "insert into indicacao values ($cod,'$cliente','$prestador')";
    if($resultado = $mysqli->query($in)==true or die ($mysqli->error)){
        echo "indicação feita com sucesso";
    }else{
        echo "indicação não conseguiu ser realizada";
    }
    ?>
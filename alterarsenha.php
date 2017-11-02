<?php

include 'conexao.php';

$email = $_POST['login'];
$senhaantiga = $_POST['antigasenha'];
$senhanova = $_POST['novasenha'];



$sql = "SELECT nm_email, cd_senha from prestador where nm_email = '$email' and cd_senha = '$senhaantiga'";
$resultado = $conectar->query($sql);

$row = $resultado->fetch_assoc();
     if($row['nm_email'] == $email and $row['cd_senha'] == $senhaantiga) {
         $senha = crypt($senhanova,'rl');
         $update = "update prestador set cd_senha = '$senha' where nm_email = '$email' and cd_senha = '$senhaantiga'";
         $conectar->query($update);
         if($conectar->query($update) === true){
             echo "Alteração feita com sucesso";
         }else{
             echo "Não foi possivel realizar a alteração";
         }
         
         
     }else{
         
         echo'Usuario invalido';
     }


?>
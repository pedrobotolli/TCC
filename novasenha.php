<?php
include("conexao.php");
$senhaantiga = $_POST["senhaantiga"] ;
$senha1= $_POST["senha1"];
$senha2= $_POST["senha2"];
if($senha1==$senha1)
{
    $senhaA = crypt($senhaantiga,'rl');
    $senhanova	= crypt($senha1,'rl');
    $email = $_POST["email"];	
    $sql="update prestador set cd_senha='$senha1' where nm_email='$email' and cd_senha='$senhaA'";
    $mysqli->query($sql) or die ($mysqli->error);
}
else
{
    header('nova_senha.php?erro=1');
}
?>
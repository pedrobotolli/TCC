<?php
include("conexao.php");
$senhaantiga = $_POST["senhaantiga"] ;
$senhaA = crypt($senhaantiga,'rl');
$senha1 = $_POST["senha1"];
$senhanova	= crypt($senha1,'rl');
$email = $_POST["email"];	
$sql="update prestador set cd_senha='$senha1' where nm_email='$email' and cd_senha='$senhaA'";
$mysqli->query($sql) or die ($mysqli->error);

?>
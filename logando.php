<?php

session_start();
include 'conexao.php';

$email = $_GET['login'];
$senha = $_GET['senha'];
if($senha==NULL){
	$senha='0';
}
//$senha = crypt($password,'rl');

	 $sql = "SELECT nm_email, cd_senha, cd_cpf_prestador from prestador where nm_email = '$email' and cd_senha = '$senha'";
	 $resultado = $mysqli->query($sql) or die ($mysqli->error);;
     $row = $resultado->fetch_assoc();
     if($row['nm_email'] == $email)
	 {
				     	if($row['cd_senha'] == $senha)
						{
				     		echo 'usuario existe';
										$_SESSION['cod'] = 2;
				                        $_SESSION['email'] = $email;
				                        $_SESSION['CPF_PREST'] = $row['cd_cpf_prestador'];
							header('location: busca.php?perfil='. $email);
					 	}
					 	else
					 	{
						 	echo "senha incorreta";
						 	header('location: login.html');
					 	}
     }
	else
	{
        $sql = "SELECT nm_email, cd_senha from cliente where nm_email = '$email' and cd_senha = '$senha'";
	 	$resultado = $mysqli->query($sql) or die ($mysqli->error);
     	$row = $resultado->fetch_assoc();
		echo $row['nm_email'];
     	if($row['nm_email'] == $email)
	 	{
     		if($row['cd_senha'] == $senha)
			{
     		  echo 'usuario existe';
     						$_SESSION['cod'] = 1;
                            $_SESSION['email'] = $email;
                            $_SESSION['CPF'] = $row['cd_cpf_cliente'];
			  header('location: busca.php?perfil='. $email);
	 		}
	 		else
	 	   {
		 	 echo "senha incorreta";
		 	 header('login.php');
	 	   }
        }
		else
		{
			$sql = "select nm_email,nm_adm from adm where nm_email = '". $email ."'";
	 		$resultado = $mysqli->query($sql) or die ($mysqli->error);
     		$row = $resultado->fetch_assoc();
     		if($row['nm_email'] == $email)
	 		{
                    $_SESSION['email'] = $email;
     			header("location: admin.php");
        	}
			else
			{
				echo 'Esse Usuario nao existe';
				header('location: login.html');
				exit;
			}
		}
    }



?>

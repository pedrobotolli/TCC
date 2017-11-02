<?php
session_start();
$_SESSION['usuario'] = $_GET['perfil'];
echo $_SESSION['usuario'];
echo "deu certo";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
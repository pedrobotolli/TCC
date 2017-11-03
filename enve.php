<?php 

// autoload do Composer 
require 'vendor/autoload.php'; 

// as duas linhas que carregam as variáveis do .env para variáveis de ambiente 
$dotenv = new Dotenv\Dotenv( __DIR__ , 'sendgrid.env'); 
$dotenv->load();
$key = getenv('SENDGRID_API_KEY');
print_r( $key );
?>
<?php
// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
// de $_FILES.
date_default_timezone_set("Brazil/East");
$ext = strtolower(substr($_FILES['fileUpload']['name'],-4)); //Pegando extensão do arquivo
$dir = '/home/ubuntu/workspace/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$path = $_FILES['userfile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$new_name = date("Y.m.d-H.i.s") . "." . $ext;

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $dir.$new_name)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}

echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";

?>
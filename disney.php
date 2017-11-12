<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form enctype="multipart/form-data" action="enviarArq.php" method="POST">
    <!-- MAX_FILE_SIZE deve preceder o campo input -->
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    <!-- O Nome do elemento input determina o nome da array $_FILES -->
    Enviar esse arquivo: <input name="userfile" type="file" />
    <input type="submit" value="Enviar arquivo" />
</form>

</body>
</html>
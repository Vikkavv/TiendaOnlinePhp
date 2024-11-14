<?php
    require_once "../Modelo/db.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
</head>
<body>
<h1>Menú</h1>
<h3>¿Qué quieres hacer, <?php echo $_SESSION["nickname"]; ?>?</h3>

<a href="editaCliente.php">Editar un cliente</a>
<br>
<a href="eliminaCliente.php">Eliminar un cliente</a>
<br>
<a href="mostrarClientes.php">Mostrar la base de clientes</a>
</body>
</html>

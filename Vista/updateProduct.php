<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Modelo/DAOProducto.php" method="post">
        <label for="nombre">Nombre del producto: </label><br>
        <input type="text" name="nombre"><br>
        <label for="descripcion">Descripcion del producto: </label><br>
        <input type="text" name="descripcion"><br>
        <label for="precio">Precio del producto: </label><br>
        <input type="text" name="precio"><br>
        <label for="cliente_id">Cliente_id del producto: </label><br>
        <input type="text" name="cliente_id"><br>
        <input type="submit" value="Crear producto">
    </form>
</body>
</html>
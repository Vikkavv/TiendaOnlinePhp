<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include "../Modelo/db.php";
?>
<body>
    <form action="../Controlador/controlPeticionesProducto.php" method="post">
        <label for="nombre">Nombre del producto: </label><br>
        <?php
            $alert = '';
            if(isset($_SESSION['NameNotValid'])){
                $alert = "El nombre debe contener únicamente números y letras y tener mínimo 5 caracteres.";
                unset($_SESSION['NameNotValid']);
                print '<label name="nombre" class="alert">'.$alert.'</label><br>';
            }elseif(isset($_SESSION['NameAE'])){
                $alert = "El nombre del producto ya existe, debe de ser único.";
                unset($_SERVER['NameAE']);
                print '<label name="nombre" class="alert">'.$alert.'</label><br>';
            }
        ?>
        <input type="text" name="nombre"><br>
        <label for="descripcion">Descripcion del producto: </label><br>
        <input type="text" name="descripcion"required><br>
        <label for="precio">Precio del producto: </label><br>
        <?php
            if(isset($_SESSION['NegPrice'])){
                $alert = "El precio debe de ser positivo.";
                unset($_SERVER['NegPrice']);
                print '<label name="nombre" class="alert">'.$alert.'</label><br>';
            }
        ?>
        <input type="text" name="precio" required><br>
        <label for="cliente_id">Cliente_id del producto: </label><br>
        <input type="text" name="cliente_id" required><br>
        <input type="submit" name="insert" value="Crear producto">
    </form>
</body>
</html>
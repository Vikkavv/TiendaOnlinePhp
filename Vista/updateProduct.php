<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/styles.css">
</head>
<?php
include_once "../Modelo/db.php";
?>

<body>
    <div class="container-actualizaP">
        <div class="card-actualizaP">
            <h1>Actualiza un producto</h1>
            <form action="../Controlador/controlPeticionesProducto.php" method="post" enctype="multipart/form-data">
                <label for="id">Id del producto a modificar </label><br>
                <?php
                $alert = '';
                if (isset($_SESSION['IdNAN']) || isset($_SESSION['IdNotExists'])) {
                    if (isset($_SESSION['IdNAN'])) {
                        $alert = "El id no puede estar vacío o contener símbolos o letras.";
                        unset($_SESSION['IdNAN']);
                        unset($_SESSION['IdNotExists']);
                        print '<label name="id" class="alert">' . $alert . '</label><br>';
                    } else {
                        $alert = "El id de producto no existe";
                        unset($_SESSION['IdNotExists']);
                        print '<label name="id" class="alert">' . $alert . '.</label><br>';
                    }
                }
                ?>
                <input type="text" name="id"><br>
                <label for="nombre">Nombre del producto </label><br>
                <?php
                if (isset($_SESSION['NameNotValid'])) {
                    $alert = "El nombre debe contener únicamente números y letras y tener mínimo 5 caracteres (o vacío para conservar el nombre actual).";
                    unset($_SESSION['NameNotValid']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                } elseif (isset($_SESSION['NameAE'])) {
                    $alert = "El nombre del producto ya existe, debe de ser único.";
                    unset($_SESSION['NameAE']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                }
                ?>
                <input type="text" name="nombre"><br>
                <label for="descripcion">Descripcion del producto </label><br>
                <input type="text" name="descripcion"><br>
                <label for="precio">Precio del producto </label><br>
                <?php
                if (isset($_SESSION['NegPrice'])) {
                    $alert = "El precio debe de ser positivo.";
                    unset($_SESSION['NegPrice']);
                    print '<label name="nombre" class="alert">' . $alert . '</label><br>';
                }
                ?>
                <input type="text" name="precio" value=""><br>
                <label for="foto">Foto de producto</label><br>
                <input type="file" name="ficheroSubida" id="ficheroSubida"><br>
                <label for="cliente_id">Cliente_id del producto </label><br>
                <input type="text" name="cliente_id"><br><br>
                <input type="submit" name="update" value="Actualizar producto">
            </form>
        </div>
    </div>

</body>

</html>
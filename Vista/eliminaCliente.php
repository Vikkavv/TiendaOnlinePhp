<?php
require_once "../Modelo/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina cliente</title>
    <link rel="stylesheet" href="Assets/styles.css">

</head>

<body>
    <div class="container-elimina">
        <div class="card-elimina">
            <h1>Elimina cliente</h1>

            <form action="../Controlador/controlPeticionesCliente.php" method="post">
                <label for="id">Indica el id del cliente a eliminar</label>
                <br><br>
                <input type="text" id="id" name="id">
                <?php
                if (isset($_SESSION['mensajeEliminaCliente'])) {
                    echo $_SESSION['mensajeEliminaCliente'];
                    unset($_SESSION['mensajeEliminaCliente']);
                }

                if (isset($_SESSION['idVacio'])) {
                    echo $_SESSION['idVacio'];
                    unset($_SESSION['idVacio']);
                }
                ?>
                <br><br>
                <input type="submit" name="eliminaCliente" value="Eliminar">
            </form>
        </div>
    </div>
</body>

</html>
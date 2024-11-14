<?php
require_once "../Modelo/DAOCliente.php";

$DAOCliente = new DAOCliente();

$arrayClientes = $DAOCliente->selectAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos de clientes</title>
    <style>
        caption{border: 1px black solid}
        th{border: 1px black solid}
        td{border: 1px black solid}
        th, td{padding: 10px; text-align: center;}
    </style>
</head>
<body>

    <table>
        <caption><strong>Base de datos de clientes</strong></caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nickname</th>
            <th>Password</th>
            <th>Telefono</th>
            <th>Domicilio</th>
            
        </tr>
        <?php
            foreach ($arrayClientes as $cliente) {
                print "<tr>";
                    print "<td>" .$cliente->getId(). "</td>";
                    print "<td>" .$cliente->getNombre(). "</td>";
                    print "<td>" .$cliente->getApellido(). "</td>";
                    print "<td>" .$cliente->getNickname(). "</td>";
                    print "<td>" .$cliente->getPassword(). "</td>";
                    print "<td>" .$cliente->getTelefono(). "</td>";
                    print "<td>" .$cliente->getDomicilio(). "</td>";
                print "</tr>";
            }
        ?>
    </table>

    <p>¿Quieres volver al menú? Pincha <a href="gestionCliente.php">aquí</a>.</p>
</body>
</html>




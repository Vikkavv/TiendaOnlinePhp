<?php
require_once "../Modelo/db.php";

function validaDatosRegistro($nombre, $apellido, $nickname, $password, $telefono, $domicilio){
    $validaNombre = "/\w{4,}/";
    $validaPassword = "/[A-Za-z0-9]{5,}/";

    $nombreCorrecto = false;
    $nicknameCorrecto = false;
    $passwordCorrecto = false;

    //Valida que el nombre tenga caracteres alfanumericos
    if (preg_match($validaNombre, $nombre)) {
        $nombreCorrecto = true;
    }
    else{
        $_SESSION["mensajeNombre"] = "Asegúrate de que el nombre tiene caracteres alfanuméricos";
    }

    //Valida que el nickname tenga caracteres alfanumericos
    if (preg_match($validaNombre, $nickname)) {
        $nicknameCorrecto = true;
    }
    else{
        $_SESSION["mensajeNickname"] = "Asegúrate de que el nickname tiene caracteres alfanuméricos";
    }

    //Valida que la contraseña sea valida
    if (preg_match($validaPassword, $password)) {
        $passwordCorrecto = true;
    }
    else{
        $_SESSION["mensajePassword"] = "Asegúrate de que la contraseña contenga mayúsculas, minúsculas, números y sea lo suficientemente larga ";
    }

    if ($nombreCorrecto && $nicknameCorrecto && $passwordCorrecto) {
        $cliente = new DTOCliente($nombre, $apellido, $nickname, $password, $telefono, $domicilio);

        $DAOCliente = new DAOCliente();
        if ($DAOCliente->aniadeSiNoExisteCliente($nickname)){
            $DAOCliente->aniadirCliente($cliente);
        }

        $_SESSION["nickname"] = $cliente->getNickname();
        $_SESSION["cliente"] = $cliente;

        header("Location:../Vista/gestionCliente.php");
        exit();
    }
    else {
        header("Location:../Vista/registro.php");
        exit();
    }
}

function validaDatosInicioSesion($nickname, $password){
    $validaNombre = "/\w{4,}/";
    $validaPassword = "/[A-Za-z0-9]{5,}/";

    $nicknameCorrecto = false;
    $passwordCorrecto = false;

    //Valida que el nombre tenga caracteres alfanumericos
    if (preg_match($validaNombre, $nickname)) {
        $nicknameCorrecto = true;
    }
    else{
        $_SESSION["mensajeNickname"] = "Asegúrate de que el nickname tiene caracteres alfanuméricos";
    }

    //Valida que la contraseña sea valida
    if (preg_match($validaPassword, $password)) {
        $passwordCorrecto = true;
    }
    else{
        $_SESSION["mensajePassword"] = "Asegúrate de que la contraseña contenga mayúsculas, minúsculas, números y sea lo suficientemente larga ";
    }

    if ($nicknameCorrecto && $passwordCorrecto) {
        $DAOCliente = new DAOCliente();
        $_SESSION["nickname"] = $_POST['nickname'];
        $_SESSION["cliente"] = $DAOCliente->selectByNickname($_POST['nickname']);

        $DAOCliente = new DAOCliente();
        $DAOCliente->compruebaClienteEnBD($nickname, $password);
    }
    else{
        header("Location:../Vista/inicioSesion.php");
        exit();
    }
}

function validaNombreModificar($nombre){
    $validaNombre = "/\w{4,}/";

    $nombreCorrecto = false;


    //Valida que el nombre tenga caracteres alfanumericos
    if (preg_match($validaNombre, $nombre)) {
        $nombreCorrecto = true;
    }
    /*else{
        $_SESSION["mensajeNombre"] = "Asegúrate de que el nombre tiene caracteres alfanuméricos";
    }*/

    return $nombreCorrecto;
}

function validaNicknameModificar($nickname){
    $validaNombre = "/\w{4,}/";

    $nombreCorrecto = false;


    //Valida que el nombre tenga caracteres alfanumericos
    if (preg_match($validaNombre, $nickname)) {
        $nombreCorrecto = true;
    }
    /*else{
        $_SESSION["mensajeNickname"] = "Asegúrate de que el nickname tiene caracteres alfanuméricos";
    }*/

    return $nombreCorrecto;
}

function validaPasswordModificar($password){
    $validaPassword = "/[A-Za-z0-9]{5,}/";

    $passwordCorrecto = false;

    //Valida que la contraseña sea valida
    if (preg_match($validaPassword, $password)) {
        $passwordCorrecto = true;
    }
    /*else{
        $_SESSION["mensajePassword"] = "Asegúrate de que la contraseña contenga mayúsculas, minúsculas, números y sea lo suficientemente larga ";
    }*/

    return $passwordCorrecto;
}

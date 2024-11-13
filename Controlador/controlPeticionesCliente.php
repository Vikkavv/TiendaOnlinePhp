<?php
require_once "validacionPeticionCliente.php";
require_once "../Modelo/DTOCliente.php";
require_once "../Modelo/DAOCliente.php";

if (isset($_POST["enviaRegistro"])){
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['nickname']) && isset($_POST['password'])
        && isset($_POST['telefono']) && isset($_POST['domicilio'])){

        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['nickname']) && !empty($_POST['password'])
            && !empty($_POST['telefono']) && !empty($_POST['domicilio'])){
            validaDatosRegistro($_POST["nombre"], $_POST["apellido"], $_POST["nickname"], $_POST["password"],
                $_POST["telefono"], $_POST["domicilio"]);
        }
        else{
            if (empty($_POST["nombre"])){
                $_SESSION["nombreVacio"] = "Ha dejado el nombre vacío. Escriba uno, por favor.";
            }
            if (empty($_POST["apellido"])){
                $_SESSION["apellidoVacio"] = "Ha dejado el apellido vacío. Escriba uno, por favor.";
            }
            if (empty($_POST["nickname"])){
                $_SESSION["nicknameVacio"] = "Ha dejado el nickname vacío. Escriba uno, por favor.";
            }
            if (empty($_POST["password"])){
                $_SESSION["passwordVacio"] = "Ha dejado la contraseña vacía. Escriba una, por favor.";
            }
            if (empty($_POST["telefono"])){
                $_SESSION["telefonoVacio"] = "Ha dejado el teléfono vacío. Escriba uno, por favor.";
            }
            if (empty($_POST["domicilio"])){
                $_SESSION["domicilioVacio"] = "Ha dejado el domicilio vacío. Escriba uno, por favor.";
            }

            header("Location:../Vista/registro.php");
            exit();
        }
    }
}
elseif (isset($_POST["enviaInicio"])){
    if (isset($_POST["nickname"]) && isset($_POST["password"])){
        if (!empty($_POST["nickname"]) && !empty($_POST["password"])){
            validaDatosInicioSesion($_POST["nickname"], $_POST["password"]);
        }
        else{
            if (empty($_POST["nickname"])){
                $_SESSION["nicknameVacio"] = "Ha dejado el nickname vacío. Escriba uno, por favor.";
            }
            if (empty($_POST["password"])){
                $_SESSION["passwordVacio"] = "Ha dejado la contraseña vacía. Escriba una, por favor.";
            }

            header("Location:../Vista/inicioSesion.php");
            exit();
        }
    }
}
elseif (isset($_POST["eliminaCliente"])){
    if (isset($_POST["id"])){
        if (!empty($_POST["id"])){
            $daoCliente = new DAOCliente();
            $daoCliente->eliminaCliente($_POST["id"]);
        }
        else{
            $_SESSION["idVacio"] = "Ha dejado el campo vacío. Escriba un id, por favor";

            header("Location:../Vista/eliminaCliente.php");
            exit();
        }

    }
}
elseif (isset($_POST["editaCliente"])){
    if (isset($_POST["id"])){
        $daoCliente = new DAOCliente();
        $daoCliente->modificaCliente($_POST["nombre"], $_POST["apellido"], $_POST["nickname"], $_POST["password"],
            $_POST["telefono"], $_POST["domicilio"], $_POST["id"]);
    }
}
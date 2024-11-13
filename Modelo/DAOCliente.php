<?php
require_once 'db.php';
require_once "DTOCliente.php";

class DAOCliente{
    private $conn;

    public function __construct(){
        $this->conn = $conn = db::getConnection();
    }

    public function selectCliente($id){
        $cliente = null;

        $stmt = $this->conn->prepare("SELECT * FROM cliente WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new DTOCliente( $row["nombre"], $row["apellido"], $row["nickname"], $row["password"], $row["telefono"], $row["domicilio"], $row["id"]);
            }
        }
        else{
            //codificar un header que lleve a una pagina
            $mensajeId = "La id especificada no existe";
            print $mensajeId;
        }
        return $cliente;
    }

    public function selectAll(){
        $sql = "SELECT * FROM cliente";
        $resultado = $this->conn->query($sql);
        $clientes = [];

        if ($resultado->rowCount() > 0) {
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $clientes []= new DTOCliente($row["nombre"], $row["apellido"], $row["nickname"], $row["password"], $row["telefono"], $row["domicilio"], $row["id"]);
            }
        }
        return $clientes;
    }

    public function aniadirCliente($DTOCliente){
        $nombre = $DTOCliente->getNombre();
        $apellido = $DTOCliente->getApellido();
        $nickname = $DTOCliente->getNickname();
        $password = $DTOCliente->getPassword();
        $telefono = $DTOCliente->getTelefono();
        $domicilio = $DTOCliente->getDomicilio();

        $stmt = $this->conn->prepare("INSERT INTO cliente (nombre, apellido, nickname, password, telefono, domicilio)
                                      VALUES (:nombre, :apellido, :nickname, :password, :telefono, :domicilio)");
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":nickname", $nickname);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->bindParam(":domicilio", $domicilio);

            return $stmt->execute();
    }

    public function modificaCliente($nombre, $apellido, $nickname, $password, $telefono, $domicilio, $id){      //Obligtorio pedir $id
        $cliente = $this->selectCliente($id);

        if ($cliente){
            if ($nombre == ""){
                $nombre = $cliente->getNombre();
            }
            else{

            }
            if ($apellido == ""){
                $apellido = $cliente->getApellido();
            }
            if ($nickname == ""){
                $nickname = $cliente->getNickname();
            }
            else{

            }
            if ($password == ""){
                $password = $cliente->getPassword();
            }
            else{

            }
            if ($telefono == ""){
                $telefono = $cliente->getTelefono();
            }
            if ($domicilio == ""){
                $domicilio = $cliente->getDomicilio();
            }

            if (validaNombreModificar($nombre) && validaNicknameModificar($nickname) && validaPasswordModificar($password)
                && validaPasswordModificar($password)){
                $stmt = $this->conn->prepare("UPDATE cliente SET nombre = :nombre, apellido = :apellido, 
                nickname = :nickname, password = :password, telefono = :telefono, domicilio = :domicilio WHERE id = :id");
                $stmt->bindParam(":nombre", $nombre);
                $stmt->bindParam(":apellido", $apellido);
                $stmt->bindParam(":nickname", $nickname);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":telefono", $telefono);
                $stmt->bindParam(":domicilio", $domicilio);
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                header("Location:../Vista/mostrarClientes.php");
                exit();
            }
            else{
                if (!validaNombreModificar($nombre)){
                    $_SESSION["mensajeNombre"] = "Asegúrate de que el nombre tiene caracteres alfanuméricos";
                }
                if (!validaNicknameModificar($nickname)){
                    $_SESSION["mensajeNickname"] = "Asegúrate de que el nickname tiene caracteres alfanuméricos";
                }
                if (!validaPasswordModificar($password)){
                    $_SESSION["mensajePassword"] = "Asegúrate de que la contraseña contenga mayúsculas, minúsculas, números y sea lo suficientemente larga ";
                }

                header("Location:../Vista/editaCliente.php");
                exit();
            }
        }
        else{
            $_SESSION["mensajeEditaCliente"] = "La id especificada no existe";

            header("Location:../Vista/editaCliente.php");
            exit();
        }
    }

    public function eliminaCliente($id){
        $cliente = $this->selectCliente($id);

        if ($cliente){
            $stmt = $this->conn->prepare("DELETE FROM cliente WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            header("Location:../Vista/mostrarClientes.php");
            exit();
        }
        else{
            $_SESSION["mensajeEliminaCliente"] = "La id especificada no existe";

            header("Location:../Vista/eliminaCliente.php");
            exit();
        }
    }

    function compruebaClienteEnBD($nickname, $password){
        $existeCliente = false;
        $sql = "SELECT * FROM cliente";
        $resultado = $this->conn->query($sql);

        if ($resultado->rowCount() > 0) {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                if ($nickname == $row["nickname"] && $password == $row["password"]) {
                    $existeCliente = true;
                    break;
                }
            }
        }

        if ($existeCliente) {
            header("Location:../Vista/menu.php");
            exit();
        }
        else{
            $_SESSION["errorCliente"] = "Los datos introducidos no coinciden con ningún cliente. Vuelva a introducirlos";

            header("Location:../Vista/inicioSesion.php");
            exit();
        }
    }

    function aniadeSiNoExisteCliente($nickname){
        $existeCliente = false;
        $sql = "SELECT * FROM cliente";
        $resultado = $this->conn->query($sql);

        if ($resultado->rowCount() > 0) {
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                if ($nickname == $row["nickname"]) {
                    $existeCliente = true;
                    break;
                }
            }
        }

        if ($existeCliente) {
            $_SESSION["existeCliente"] = "Los datos que intentas registrar ya pertenecen a un cliente. Introduce otros, por favor.";
            header("Location:../Vista/registro.php");
            exit();
        }
        else{
            return true;
        }
    }
}

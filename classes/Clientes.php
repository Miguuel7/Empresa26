<?php 

include_once '../aula290926/config.php';

class Clientes{

    public $ClientesID;
    public $Nome;
    public $Telefone;
    public $Email;
    public $ConexaoDB; 

     function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    }

    public function exibirClientes(){
        $sql = 'SELECT * FROM Clientes';
        $resultado = $this->ConexaoDB->query($sql);
        if($resultado && $resultado->num_rows > 0) {
            $registros = array();
            while($row = $resultado->fetch_assoc()) {
                array_push($registros,$row);
            }
            return $registros;
        }else{
            return 'Sem registros';
         }
}

public function exibirCliente($ClientesID){
        if ($ClientesID != '' && is_numeric($ClientesID)) {
            $sql = 'SELECT * FROM Clientes WHERE ClientesID = '.$ClientesID;
            $resultado = $this->ConexaoDB->query($sql);
            if ($resultado && $resultado->num_rows > 0) {
                return $resultado->fetch_assoc();
            }
            return 'Sem registros';
        }
        return 'ClienteID inválido';
    }

    public function excluirCliente($ClientesID){
        if ($ClientesID != '' && is_numeric($ClientesID)) {
            $sql = 'DELETE FROM Clientes WHERE ClientesID = '. $ClientesID;
            if($this->ConexaoDB->query($sql) ==  TRUE){
                return 'Registro excluido com sucesso';
            } else {
                return 'Erro ao excluir registro: ='.  $ClientesID;
            }
        }
        return 'ClientesID inválido';

    }

    public function salvarCliente($ClientesID = ''){
        if (is_numeric($ClientesID)) {
            $sql = 'UPDATE Clientes SET Nome = "'. $this->Nome. '",    Telefone = "'. $this->Telefone. '", Email = "'. $this->Email. '" WHERE ClientesID = '. $ClientesID;
        } else {
            $sql = 'INSERT INTO Clientes (Nome, Telefone, Email)
        VALUES (" ' . $this->Nome. '", "'. $this->Telefone .'", "'. $this->Email. '")';
        }
    }

    public function __destruct(){
       $this->ConexaoDB->close();
       $this->ConexaoDB = null;
    }
}
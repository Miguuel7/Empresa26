<?php 

include_once '../aula290926/config.php';

class Setores{

    public $SetorID;
    public $Nome;
    public $Andar;
    public $Cor;
    public $ConexaoDB; 

     function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    }

    public function exibirSetores(){
        $sql = 'SELECT * FROM setor';
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

public function exibirSetor($setorID){
        if ($setorID != '' && is_numeric($setorID)) {
            $sql = 'SELECT * FROM setor WHERE SetorID = '.$setorID;
            $resultado = $this->ConexaoDB->query($sql);
            if ($resultado && $resultado->num_rows > 0) {
                return $resultado->fetch_assoc();
            }
            return 'Sem registros';
        }
        return 'SetorID inválido';
    }

    public function excluirSetor($setorID){
        if ($setorID != '' && is_numeric($setorID)) {
            $sql = 'DELETE FROM setor WHERE SetorID = '. $setorID;
            if($this->ConexaoDB->query($sql) ==  TRUE){
                return 'Registro excluido com sucesso';
            } else {
                return 'Erro ao excluir registro: ='.  $setorID;
            }
        }
        return 'SetorID inválido';

    }

    public function salvarSetor($setorID = ''){
        if (is_numeric($setorID)) {
            $sql = 'UPDATE setor SET Nome = "'. $this->Nome. '",    Andar = "'. $this->Andar. '", Cor = "'. $this->Cor. '" WHERE SetorID = '. $setorID;
        } else {           
            $sql = 'INSERT INTO setor (Nome, Andar, Cor)
        VALUES (" ' . $this->Nome. '", '. $this->Andar .', "'. $this->Cor. '")';
        }
    }

    public function __destruct(){
       $this->ConexaoDB->close();
       $this->ConexaoDB = null;
    }
}
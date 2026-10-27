<?php
// inclui os dados de configuraçao do banco
// ../ = sai do um diretorio/pasta  ./ mesma pasta
include_once  '../aula290926/config.php';
 
class Cargos{
 
    // os atributos - no minimo os nomes dos campos da tabela
    public $CargoID;
    public $Nome;
    public $TetoSalarial;
    public $ConexaoDB; // atributo do banco de dados/conexao
 

    //construtor -
    function __construct(){
        // atribuindo ao atributo a conexao com o banco de dados
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }
 
    // function __destruct(){
       
  //  }
   
  

  
    // metodos da entidade/classe
    public function exibirCargos(){
        // monta a SQL que ira consultar no banco
        $sql = 'SELECT * FROM cargos';
        // executa no banco a query SQL e coloca o resultado na variavel
        $resultado = $this->ConexaoDB->query($sql);
 
        if($resultado && $resultado->num_rows > 0){
            //cria o array
            $registros = array();
            //laco de repeticao que retorna os dados
            while($row = $resultado->fetch_assoc()){
                array_push($registros,$row);
            }
            return $registros;
        }else{
            return 'Sem registros';
        }
    }
 
    public function exibirCargo($cargoID = null){
        if ($cargoID != '' && is_numeric($cargoID)) {
            $sql = 'SELECT * FROM cargos WHERE CargoID = '.$cargoID;
            $resultado = $this->ConexaoDB->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                return $resultado->fetch_assoc();
            }

            return 'Sem registros';
        }

        return 'CargoID inválido';
    }
 
    public function excluirCargo($cargoID){
        if ($cargoID != '' && is_numeric($cargoID)) {
            // monta a SQL que ira excluir no banco
            $sql = 'DELETE FROM cargos WHERE CargoID = '.$cargoID;

            if($this->ConexaoDB->query($sql) == TRUE){
                return 'Registro excluido com sucesso';
            } else {
                return 'Erro ao excluir registro: =' . $cargoID;
            }
        } else {
            return 'CargoID inválido';
        }
 
    }

    public function salvarCargo($cargoID = ''){
        if(is_numeric($cargoID))  { 
            // update na tabela
            $sql = 'UPDATE cargos Set Nome = " ' . $this->Nome. '", 
            
            TetoSalarial = "'. $this->TetoSalarial. '" WHERE CargoID = '. $cargoID;
        }else{
            // include na tabela
            $sql = 'INSERT INTO cargos (Nome, TetoSalarial) 
            VALUES  ("'. $this->Nome. '", '. $this->TetoSalarial. ')';
        }
        if ($this->ConexaoDB->query($sql) == TRUE){
            return 'Registro salvo com sucesso';
        } else {
            return 'Erro ao salvar registro: ' . $this->ConexaoDB->error;
        }
    }
    
    
    
    

    public function __destruct(){
        // fecha a conexao com o banco
        $this->ConexaoDB->close();
        $this->ConexaoDB = null;
    }
}
 
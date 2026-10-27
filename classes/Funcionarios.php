<?php include_once '../aula290926/config.php';

include_once 'Cargos.php';
include_once 'Setores.php';     
include_once 'Funcionarios.php';
include_once 'Clientes.php';
include_once '../aula290926/config.php';

class Funcionarios{ 
    public $FuncionarioID; 
    public $Nome; 
    public $DataNascimento; 
    public $Email; 
    public $Ramal; 
    public $CargoID; 
    public $SetorID; 
    public $Salario; 
    public $Sexo; 
    public $Altura; 
    public $CPF; 
    public $RG; 
    public $ConexaoDB; 
    public $objCargo; 
    public $objSetor; 
    public $dados; 

    function __construct(){ 
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME); 
    } 

    public function exibirFuncionarios(){ 
        $sql = 'SELECT * FROM Funcionario'; 
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

    public function exibirFuncionario($FuncionarioID){ 
        if ($FuncionarioID != '' && is_numeric($FuncionarioID)) { 
            $sql = 'SELECT * FROM Funcionario WHERE FuncionarioID = '.$FuncionarioID; 
            $resultado = $this->ConexaoDB->query($sql); 
            if ($resultado && $resultado->num_rows > 0) { 
                return $resultado->fetch_assoc(); 
            } 
            return 'Sem registros'; 
        } 
        return 'FuncionarioID inválido'; 
    } 

    public function excluirFuncionario($FuncionarioID){ 
        if ($FuncionarioID != '' && is_numeric($FuncionarioID)) { 
            $sql = 'DELETE FROM funcionario WHERE FuncionarioID = '. $FuncionarioID; 
            if($this->ConexaoDB->query($sql) == TRUE){ 
                return 'Registro excluido com sucesso'; 
            } else { 
                return 'Erro ao excluir registro: ='. $FuncionarioID; 
            } 
        } 
        return 'FuncionarioID inválido'; 
    } 

    public function salvarFuncionario($FuncionarioID = ''){ 
        if (is_numeric($FuncionarioID) && $FuncionarioID != '') { 
            $sql = 'UPDATE Funcionario SET Nome = "' . $this->Nome . '", DataNascimento = "' . $this->DataNascimento . '", Email = "' . $this->Email . '", Ramal = "' . $this->Ramal . '", CargoID = "' . $this->CargoID . '", SetorID = "' . $this->SetorID . '", Salario = "' . $this->Salario . '", Sexo = "' . $this->Sexo . '", Altura = "' . $this->Altura . '", CPF = "' . $this->CPF . '", RG = "' . $this->RG . '" WHERE FuncionarioID = ' . $FuncionarioID; 
        } else { 
            // Corrigido o espaço em branco que estava antes de $this->Nome
            $sql = 'INSERT INTO Funcionario (Nome, DataNascimento, Email, Ramal, CargoID, SetorID, Salario, Sexo, Altura, CPF, RG) VALUES ("' . $this->Nome. '", "'. $this->DataNascimento .'", "'. $this->Email. '", "'. $this->Ramal .'", "'. $this->CargoID .'", "'. $this->SetorID .'", "'. $this->Salario .'", "'. $this->Sexo .'", "'. $this->Altura .'", "'. $this->CPF .'", "'. $this->RG .'")'; 
        } 

        // CORREÇÃO: Executa a query criada acima e retorna o resultado
        if($this->ConexaoDB->query($sql) == TRUE){
            return 'Sucesso';
        } else {
            return 'Erro ao salvar';
        }
    } 

    public function __destruct(){ 
        $this->ConexaoDB->close(); 
        $this->ConexaoDB = null; 
    } 
}

function criarFuncionario($dados){
    $funcionario = new stdClass();
    $funcionario->FuncionarioId = $dados['FuncionarioID'];
    $funcionario->Nome = $dados['Nome'];
    $funcionario->DataNascimento = $dados['DataNascimento'];
    $funcionario->Email = $dados['Email'];
    $funcionario->Ramal = $dados['Ramal'];
    $funcionario->Cargo = $dados['CargoID'];
    $funcionario->Setor = $dados['SetorID'];
    $funcionario->Salario = $dados['Salario'];
    $funcionario->Sexo = $dados['Sexo'];
    $funcionario->Altura = $dados['Altura'];
    $funcionario->CPF = $dados['CPF'];
    $funcionario->RG = $dados['RG'];

    return $funcionario;
}

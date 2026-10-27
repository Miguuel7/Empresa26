<?php 

include_once '../aula290926/config.php';

class Categorias{

    public $CategoriasID;
    public $Nome;
    public $Descricao;
    public $ConexaoDB; 

     function __construct(){
        $this->ConexaoDB = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    }

    public function exibirCategorias(){
        $sql = 'SELECT * FROM categorias';
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

public function exibirCategoria($categoriaID){
        if ($categoriaID != '' && is_numeric($categoriaID)) {
            $sql = 'SELECT * FROM categorias WHERE CategoriasID = '.$categoriaID;
            $resultado = $this->ConexaoDB->query($sql);
            if ($resultado && $resultado->num_rows > 0) {
                return $resultado->fetch_assoc();
            }
            return 'Sem registros';
        }
        return 'CategoriasID inválido';
    }

    public function excluirCategoria($categoriaID){
        if ($categoriaID != '' && is_numeric($categoriaID)) {
            $sql = 'DELETE FROM categorias WHERE CategoriasID = '. $categoriaID;
            if($this->ConexaoDB->query($sql) ==  TRUE){
                return 'Registro excluido com sucesso';
            } else {
                return 'Erro ao excluir registro: ='.  $categoriaID;
            }
        }
        return 'CategoriasID inválido';

    }

    public function salvarCategoria($categoriaID = ''){
        if (is_numeric($categoriaID)) {
            $sql = 'UPDATE categorias SET Nome = "'. $this->Nome. '", Descricao = "'. $this->Descricao. '" WHERE CategoriasID = '. $categoriaID;
        } else {
            $sql = 'INSERT INTO categorias (Nome, Descricao)
        VALUES (" ' . $this->Nome. '", "'. $this->Descricao .'")';
        }
    }

    public function __destruct(){
       $this->ConexaoDB->close();
       $this->ConexaoDB = null;
    }
}
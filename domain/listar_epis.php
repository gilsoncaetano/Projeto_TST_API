<?php

class Epi{

    public $idepi;
    public $nomeepi;
    public $descricao;
    public $datavalidade;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function listar(){
        $query = "select * from epi";

        $stmt = $this->conexao->prepare($query);
    
        $stmt ->execute();
    
        return $stmt;
    }

}


?>
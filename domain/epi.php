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

    $stmte = $this->conexao->prepare($query);

    $stmte->execute();

    return $stmte;
}

public function cadastro(){
    $query = "insert into epi set nomeepi=:n, descricao=:d, datavalidade=:dv";

    $stmt = $this->conexao->prepare($query);

    $stmt->bindParam(":n",$this->nomeepi);
    $stmt->bindParam(":d",$this->descricao);
    $stmt->bindParam(":dv",$this->datavalidade);
    

    if($stmt->execute()){
        return true;

    }
    else{
        return false;
    }
}

public function atualizar(){
    $query = "update epi set nomeepi=:n, descricao=:d, datavalidade=:dv where idepi=:id";

    $stmte = $this->conexao->prepare($query);

    $stmte->bindParam(":n",$this->nomeepi);
    $stmte->bindParam(":d",$this->descricao);
    $stmte->bindParam(":dv",$this->datavalidade);
    $stmte->bindParam(":id",$this->idepi);

    if($stmte->execute()){
        return true;

    }
    else{
        return false;
    }
}

public function deletar(){
    $query = "delete from epi where idepi=:id";

    $stmte=$this->conexao->prepare($query);

    $stmte->bindParam(":id",$this->idepi);

    if($stmte->execute()){
        return true;
    }
    else{
        return false;
    }
 }

}

?>

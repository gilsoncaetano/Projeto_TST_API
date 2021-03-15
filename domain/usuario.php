<?php


class Usuario{

  public $idusuario;
  public $nomeusuario; 
  public $senha; 
  public $nomecompleto;
  public $cpf;
  public $sexo;
  public $idade;
  public $email;
  public $telefone;
  public $datacriacao;
  
  public function __construct($db){
    $this->conexao = $db;

}

public function listar(){
    $query = "select * from usuario";

    $stmte = $this->conexao->prepare($query);

    $stmte->execute();

    return $stmte;
}

public function cadastro(){
    $query = "insert into usuario set nomeusuario=:n, senha=:s, nomecompleto=:nc, cpf=:cf, sexo=:sx, idade=:i, email=:e, telefone=:t";


    $stmt = $this->conexao->prepare($query);

     //Criptografia de senha
     $this->senha = md5($this->senha);

    $stmt->bindParam(":n",$this->nomeusuario);
    $stmt->bindParam(":s",$this->senha);
    $stmt->bindParam(":nc",$this->nomecompleto);
    $stmt->bindParam(":cf",$this->cpf);
    $stmt->bindParam(":sx",$this->sexo);
    $stmt->bindParam(":i",$this->idade);
    $stmt->bindParam(":e",$this->email);
    $stmt->bindParam(":t",$this->telefone);

    if($stmt->execute()){
        return true;

    }
    else{
        return false;
    }
}

public function atualizar(){
    $query = "update usuario set nomeusuario=:n, senha=:s, nomecompleto=:nc, cpf=:cf, sexo=:sx, idade=:i, email=:e, telefone=:t where idusuario=:id";


    $stmte = $this->conexao->prepare($query);
     //Criptografia de senha
     $this->senha = md5($this->senha);

    $stmte->bindParam(":n",$this->nomeusuario);
    $stmte->bindParam(":s",$this->senha);
    $stmte->bindParam(":nc",$this->nomecompleto);
    $stmte->bindParam(":cf",$this->cpf);
    $stmte->bindParam(":sx",$this->sexo);
    $stmte->bindParam(":i",$this->idade);
    $stmte->bindParam(":e",$this->email);
    $stmte->bindParam(":t",$this->telefone);
    $stmte->bindParam(":id",$this->idusuario);

    if($stmte->execute()){
        return true;

    }
    else{
        return false;
    }
}

public function deletar(){
    $query = "delete from usuario where idusuario=:id";

    $stmte=$this->conexao->prepare($query);

    $stmte->bindParam(":id",$this->idusuario);

    if($stmte->execute()){
        return true;
    }
    else{
        return false;
    }
 }

}




?>

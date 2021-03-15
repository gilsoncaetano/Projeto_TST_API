<?php

class Login{

    public $idusuario;
    public $nomeusuario;
    public $senha;
    public $nomecompleto;
    public $cpf;
    public $sexo;
    public $idade;
    public $email;
    public $telefone;
    
    public function __construct($db){
        $this->conexao = $db;
    }

    public function login(){
        
        if ($query = "select
        cl.idusuario,
        cl.nomeusuario,
        cl.senha,
        cl.nomecompleto,
        cl.cpf,
        cl.sexo,
        cl.idade,
        cl.email,
        cl.telefone
        from usuario cl
         where nomeusuario=:us and senha=:s");

        $stmt = $this->conexao->prepare($query);

        $this->senha = md5($this->senha);

        $stmt->bindParam(":us",$this->nomeusuario);
        $stmt->bindParam(":s",$this->senha);

        $stmt->execute();
        return $stmt;
    }
}

?>

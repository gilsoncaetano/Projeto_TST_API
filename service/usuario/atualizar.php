<?php

header("Access-Control-Allow-Origin:*");

header("Content-Type:application/json;charset=utf-8"); 

header("Access-Control-Allow-Methods:PUT");

include_once "../../config/database.php";

include_once "../../domain/usuario.php";

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);

$data = json_decode(file_get_contents('php://input'));

if(!empty($data->nomeusuario)&& !empty($data->senha) && !empty($data->nomecompleto) && !empty($data->cpf)&& !empty($data->sexo)&& !empty($data->idade)&& !empty($data->email)&& !empty($data->telefone)&& !empty($data->idusuario)){

$usuario->nomeusuario = $data->nomeusuario;
$usuario->senha = $data->senha;
$usuario->nomecompleto = $data->nomecompleto;
$usuario->cpf = $data->cpf;
$usuario->sexo = $data->sexo;
$usuario->idade = $data->idade;
$usuario->email = $data->email;
$usuario->telefone = $data->telefone;
$usuario->idusuario = $data->idusuario;

if($usuario->atualizar()){
    header("HTTP/1.0 201");
    echo json_encode(array("mensagem"=>"Usuario Atualizado com sucesso"));

}else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Não foi possivel Atualizar dados"));
  }
}
else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Você precisa preencher todos os campos"));
}

?>
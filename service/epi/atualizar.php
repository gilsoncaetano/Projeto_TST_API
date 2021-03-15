<?php

header("Access-Control-Allow-Origin:*");

header("Content-Type:application/json;charset=utf-8"); 

header("Access-Control-Allow-Methods:PUT");

include_once "../../config/database.php";

include_once "../../domain/epi.php";

$database = new Database();
$db = $database->getConnection();

$epi = new Epi($db);

$data = json_decode(file_get_contents('php://input'));

if(!empty($data->nomeepi)&& !empty($data->descricao) && !empty($data->datavalidade)){

$epi->nomeepi = $data->nomeepi;
$epi->descricao = $data->descricao;
$epi->datavalidade = $data->datavalidade;
$epi->idepi = $data->idepi;

if($epi->atualizar()){
    header("HTTP/1.0 201");
    echo json_encode(array("mensagem"=>"EPI Atualizado com sucesso"));

}else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Não foi possivel Atualizar"));
  }
}
else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Você precisa preencher todos os campos"));
}

?>
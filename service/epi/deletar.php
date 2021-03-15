<?php

header("Access-Control-Allow-Origin:*");

header("Content-Type:application/json;charset=utf-8"); 

header("Access-Control-Allow-Methods:DELETE");

include_once "../../config/database.php";

include_once "../../domain/epi.php";

$database = new Database();
$db=$database->getConnection();

$epi = new Epi($db);

$data = json_decode(file_get_contents('php://input'));
    
$epi->idepi=$data->idepi;

if($epi->deletar()){
    header("HTTP/1.0 201");
    echo json_encode(array("mensagem"=>" EPI deletado com sucesso"));

}else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Não foi possivel deletar"));
   
}
?>


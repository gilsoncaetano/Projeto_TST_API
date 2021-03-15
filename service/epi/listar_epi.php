
<?php

header("Access-Control-Allow-Origin:*");

header("Content-Type: application/json;charset=utf-8");

include_once "../../config/database.php";

include_once "../../domain/epi.php";

$database = new Database();

$db = $database->getConnection();

$epi = new Epi($db);

$rs = $epi->listar();

if($rs->rowCount()>0){
    $epi_arr["saida"] = array();

    while($linha = $rs->fetch(PDO::FETCH_ASSOC)){

        extract($linha);
        $array_item = array(
            "idepi"=>$idepi,
            "nomeepi"=>$nomeepi,
            "descricao"=>$descricao,
            "datavalidade"=>$datavalidade,

        );

        array_push($epi_arr["saida"],$array_item);

    }

    header("HTTP/1.0 200");
    echo json_encode($epi_arr);
}
else{
    header("HTTP/1.0 400");
    echo json_encode(array("mensagem"=>"Não há EPI cadastradas"));
}
?>
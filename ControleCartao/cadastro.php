<?php

include_once("config.php");

$solici = $_POST["nome"];

$cod_cartao = $_POST["cartao"];
$sit = "Pendente";

$query1 = "INSERT INTO solicitacao(nome, data_retirada,cod_cartao,situacao) VALUES ('$solici', NOW(),$cod_cartao,'$sit')";
   
$result = mysqli_query($connexao,$query1);

if ($result) {
    header('Location: /ControleCartao/solicPendente.php');

}
else{
    $resposta = ['status' => false, 'code' => "200", 'erro' => mysqli_error($connexao)];
}


?>
<?php

include_once("config.php");

$dados = $_POST['data'];

$query = "INSERT INTO cartoes(cartao_descr) VALUES ('$dados')";

if (mysqli_query($connexao,$query)) {
    $resposta = ['status' => true, 'code' => "100"];
}
else{
    $resposta = ['status' => false, 'code' => "200", 'erro' => mysqli_error($connexao)];
}

echo json_encode($resposta);

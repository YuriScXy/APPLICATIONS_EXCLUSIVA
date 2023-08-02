<?php

include_once("config.php");

if (isset($_POST['update'])) {  
    $id=$_POST['id'];
    $valor = (float) str_replace(',', '.', $_POST['valor']);
    $vezesparcelado = $_POST['vezesparcelado'];
    $parceiro = $_POST['parceiro'];
    $desc = $_POST['desc'];

    $sqlUpdate = "UPDATE solicitacao set data_devolucao=NOW(), valor='$valor', parceiro='$parceiro', descritivo='$desc', vezesparcelado='$vezesparcelado', situacao='Aguardando' where id='$id'";

    $result=mysqli_query($connexao,$sqlUpdate);
    if ($result) {
        header('Location: /ControleCartao/finali.php');
    }
    else{
        $resposta = ['status' => false, 'code' => "200", 'erro' => mysqli_error($connexao)];
    }

}

?>
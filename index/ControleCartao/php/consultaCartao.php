<?php 

include_once("config.php");

$id_cartao = $_POST['data'];

$query = "select * from cartoes where idcartoes = $id_cartao";

$data  = mysqli_query($connexao,$query);

if ($data) {
    while($rowData = mysqli_fetch_assoc($data)){
		echo $rowData["cartao_descr"];
	}    
}
else{
    $resposta = ['status' => false, 'code' => "200", 'erro' => mysqli_error($connexao)];
}

?>
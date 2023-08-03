<?php 
    include("config.php");
    
    if (isset($_POST['n_unico'])) {
        $n_unico = $_POST['n_unico'];
        $id = $_POST['id'];
        $situacao= "Confirmado";
        
        $sqlQuery = "UPDATE solicitacao set N_UNICO_SNK='$n_unico', situacao='$situacao' where id='$id'";
        mysqli_query($connexao,$sqlQuery);
        
    }

?>
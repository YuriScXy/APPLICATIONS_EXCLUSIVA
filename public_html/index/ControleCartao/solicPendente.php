<?php 


include_once("config.php");


$query = "select * from solicitacao soc  inner join cartoes car on car.idcartoes = soc.cod_cartao where situacao = 'Pendente'";
$data  = mysqli_query($connexao,$query);
if ($data) {
    $all_rows = array();
    
    
    
}
else{
    $resposta = ['status' => false, 'code' => "200", 'erro' => mysqli_error($connexao)];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />


    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css">
    <title>Pendentes</title>
</head>

<body>
    <div>
        <nav class="menu-lateral">
            <div class="p-3 mt-3"></div>
            <ul>
                <li class="item-menu" id="it1">
                    <a href="./index.php"><span class="icon"><i class="bi bi-input-cursor-text"></i></span><span
                            class="txt-link">Cadastro</span></a>
                </li>
                <li class="item-menu" id="it2">
                    <a href="./solicPendente.php"><span class="icon"><i class="bi bi-table"></i></span><span
                            class="txt-link">Retiradas</span></a>
                </li>
                <li class="item-menu" id="it3">
                    <a href="detalhamento.php"><span class="icon"><i class="bi bi-bank2"></i></span><span
                            class="txt-link">Detalhamento</span></a>
                </li>
                <li class="item-menu" id="it3">
                    <a href="finali.php"><span class="icon"><i class="bi bi-file-earmark-person-fill"></i></span><span
                            class="txt-link">Finalização</span></a>
                </li>
                <li class="item-menu" id="it3">
                    <a href="geral.php"><span class="icon"><i class="bi bi-book"></i></span><span
                            class="txt-link">Geral</span></a>
                </li>
            </ul>
        </nav>
        <div class="table-cast" id="table-cast">
            <div>
                <div class="row line-hd" id="tb-hd">

                    <div class="col">ID</div>
                    <div class="col">SOLICITANTE</div>
                    <div class="col">CARTÃO</div>
                    <div class="col">DATA DA RETIRADA</div>
                    <div class="col">SITUAÇÃO</div>
                    <div class="col">Selecionar</div>
                </div>
                <?php
                  $cont = 0;
                     while($row_solicit = mysqli_fetch_assoc($data)){
                        $cont++;
                        $opt = 'opcao'. $cont;
                        echo '<div class="row line-tb">';
                        
                        echo '<div class="col" id="id">'.$row_solicit['id'].'</div>';
                        echo '<div class="col" id="Solicitante">'.$row_solicit['nome'].'</div>';
                        echo '<div class="col" id="Cartão">'.$row_solicit['cartao_descr'].'</div>';
                        echo '<div class="col" id="DataRetirada">'.$row_solicit['data_retirada'].'</div>';
                        echo '<div class="col" id="situacao">'.$row_solicit['situacao'].'</div>';
                        echo "<div class='col'> 
                                <a href='detalhamento.php?id=$row_solicit[id]'>
                                    <button class='btn btn-exclusiva-table'>
                                        <i class='bi bi-caret-right-square-fill'></i>
                                    </button>
                                </a>
                            </div>";
                        echo '</div> ';
                    }                 
                  ?>
            </div>
        </div>
    </div>
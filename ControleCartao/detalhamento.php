<?php

include_once("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlSelect = "select id,nome,DATE_FORMAT(data_retirada, '%d/%m/%Y')as data_retirada,car.cartao_descr from `forms-cartao`.solicitacao soc INNER JOIN `forms-cartao`.cartoes car on car.idcartoes = soc.cod_cartao
    where id=$id";
    $data  = mysqli_query($connexao,$sqlSelect);

    if (mysqli_num_rows($data) > 0) {
        while($row_solic = mysqli_fetch_assoc($data)){
            $solici = $row_solic['nome'];
            $data_solic = $row_solic['data_retirada'];
            $cartao = $row_solic['cartao_descr'];
        }
    }
    else{
        header('Location : solicPendente.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
    <title>Detalhamento</title>
</head>

<body>
    <div>
        <nav class="menu-lateral">

            <ul>
                <li class="item-menu" id="it1">
                    <a href="index.php"><span class="icon"><i class="bi bi-input-cursor-text"></i></span><span
                            class="txt-link">Cadastro</span></a>
                </li>
                <li class="item-menu" id="it2">
                    <a href="solicPendente.php"><span class="icon"><i class="bi bi-table"></i></span><span
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
                    <a href="#finalizacao"><span class="icon"><i class="bi bi-book"></i></span><span
                            class="txt-link">Geral</span></a>
                </li>
            </ul>
        </nav>
        <div class="container col-6 finalizacao" id="finalizacao">
            <div class="container bg-exclusiva p-5 h-3 mt-2 rounded-2">
                <h1 class="h1 rounded-2 p-2 text-center text-white">
                    Finalização Solicitação
                </h1>

                <form action="saveEdit.php" method="POST">
                    <fieldset>


                        <div class="mb-3">
                            <label for="solicitante" class="form-label text-white font-text-exclusiva">Solicitante
                                :</label>
                            <input type="text" class="form-control" id="solicitante" name=nome value="<?php if(isset($solici)){
                                   echo $solici;
                                }else {echo 'Selecione a Retirada Antes';} ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="dataR" class="form-label text-white font-text-exclusiva">Data De Retirada
                                :</label>
                            <input type="text" class="form-control" id="dataR" name=dataR value="<?php if(isset( $data_solic)){
                                   echo  $data_solic;
                                }else {echo 'Selecione a Retirada Antes';}  ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="cartao" class="form-label text-white font-text-exclusiva">Cartão :</label>
                            <input type="text" class="form-control" id="cartao" name=cartao value="<?php if(isset( $cartao)){
                                   echo  $cartao;
                                }else {echo 'Selecione a Retirada Antes';}  ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label text-white font-text-exclusiva">Valor :</label>
                            <input type="text" name=valor class="form-control" id="valor"
                                placeholder=" R$ 1000.00..." />
                        </div>
                        <div class=" mb-3">
                            <label for="VezesParcelado" class="form-label text-white font-text-exclusiva">Forma de
                                Pagamento
                                :</label>
                            <select class="form-select" id="vezesparcelado" name=vezesparcelado>
                                <option selected disabled>
                                    Selecione a quantidade de vezes divida
                                </option>
                                <option value=1>à vista</option>
                                <option value=2>2x</option>
                                <option value=3>3x</option>
                                <option value=4>4x</option>
                                <option value=5>5x</option>
                                <option value=6>6x</option>
                                <option value=10>10x</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label text-white font-text-exclusiva">Parceiro :</label>
                            <input type="text" name=parceiro class="form-control" id=valor placeholder="Nadir..."
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label text-white font-text-exclusiva">Descrição :</label>
                            <input type="text" name=desc class="form-control" id="desc" placeholder="24 cx de Taça... "
                                required />
                        </div>
                        <input type="hidden" name=id id=id value="<?php echo $id ?>" href="" />
                        <input class="btn-exclusiva mt-4 p-2" type="submit" name=update id=update value="Atualizar"
                            href="" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
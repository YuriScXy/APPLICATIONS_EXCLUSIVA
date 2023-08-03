<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css" />
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="style.css" />
    <title>Controle Cartão</title>
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
                    <a href="geral.php"><span class="icon"><i class="bi bi-book"></i></span><span
                            class="txt-link">Geral</span></a>
                </li>
            </ul>
        </nav>

        <div class="container  col-6 bg-exclusiva p-5 h-3 mt-2 rounded-2">
            <h1 class="h1 rounded-2 p-2 text-center text-white">
                Cadastro Solicitação
            </h1>
            <form action="cadastro.php" method="POST">
                <fieldset>

                    <div class="mb-3">
                        <label for="solicitante" class="form-label text-white font-text-filtro">Solicitante
                            :</label>
                        <input type="text" class="form-control" id="solicitante" name=nome
                            placeholder="Nome de quem pegou o cartão..." required />
                    </div>
                    <div class="mb-3">
                        <label for="cartao" class="form-label text-white font-text-exclusiva">Cartão :</label>
                        <select class="form-select" aria-label="Default select example" id="cartao" name="cartao">
                            <option value="0" disabled>Selecione o cartão</option>
                            <option value=1>Bradesco - EXC</option>
                            <option value=2>Santander - PRIME</option>
                            <option value=3>Bradesco - SG</option>
                            <option value=4>Bradesco - ASG</option>
                            <option value=5>Tribanco - T4</option>
                        </select required>
                    </div>
                    <a href="#table-cast" name="cadastrar">
                        <input class="btn-exclusiva mt-4 p-2" type="submit" value="Cadastrar" name=cadastrar />
                    </a>
                </fieldset>
            </form>
        </div>
    </div>

    </div>
</body>

</html>
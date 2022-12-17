<?php
    require __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\DataLayer\Connect;

    $conn = Connect::getInstance();
    $error = Connect::getError();

    if ($error){
        echo $error->getMessage();
        die();
    }

    use Source\Models\Contractor;

    $contractor = new Contractor();
    $list = $contractor->find()->fetch(true);

    foreach ($list as $contractorItem){   
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="assets/img/Logo Up Assistência Cor.png" type="image/png">
        <title>Lista de Contratantes</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
    
        <link href="assets/css/styleIndex.css" rel="stylesheet">
    </head>
    <body>
        <div class="container"> 
            <br/>
            <h2 id="tituloLista">__Lista de Contratantes__</h2>
            
            <img src="assets/img/Logo Up Assistência Cor.png" id="logoUP" type="image/png">

            <form action="" method="GET" value="" id="formFiltro">
                <div  class="row" id="Filtro">
                    <div class="col-5" id="botoesTopoPagina-formFiltro">
                        <a href="site/form.php?acao=insert" class="btn btn-outline-up" title="Cadastrar contratante" id="botaoCadastrar">Cadastrar</a>
                        <a href="site/listaEmpresasContratantes.php" class="btn btn-outline-up" title="Lista de Empresas Contratantes" id="botaoListaEmpresasContratantes">Lista de Empresas Contratantes</a>
                    </div>

                    <div class="col-3">
                    </div>

                    <div class="col-4" id="divInput">
                        <input class="form-control" id="inputFiltrar" type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Digite o nome que deseja filtrar" autocomplete="off">

                        <input id="botaoFiltrar" class="btn btn-outline-up" type="submit" name="" value="Filtrar">
                    </div>
                </div>
            </form>
            
            <?php
                if (isset($_GET['msgSucesso'])) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_GET['msgSucesso'] ?>
                    </div>
                    <?php
                }

                if (isset($_GET['msgError'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['msgError'] ?>
                    </div>
                    <?php
                }
            ?>

            <table class="table table-responsive table-bordered table-striped table-sm" id="tabelaLista">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Celular</th>
                        <th>Telefone</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>
                    <?php   
                        if (isset($_GET['k']) && $_GET['k']) {

                            $k = trim($_GET['k']);

                            $search_string = "SELECT * FROM contratante WHERE ";
                            $display_words = "";

                            $keyword = explode(' ',$k);

                            foreach ($keyword as $word) {
                                $search_string .= "Nome LIKE '%".$word."%' OR ";
                                $display_words .= $word.' ';
                            }
                            $search_string = substr($search_string, 0, strlen($search_string)-4);
                            $display_words = substr($display_words, 0, strlen($display_words)-1);
                            $query = $conn->prepare($search_string);
                            $query -> execute();
                            
                            $filteredNames = $query-> fetchAll();

                            $result_count = $query -> fetchColumn();


                                if (!empty($filteredNames) && is_array($filteredNames)) {

                                    foreach ($filteredNames as $count){
                                    ?>
                                        <tr>
                                            <td><?= $count->Nome ?></td>
                                            <td><?= $count->RG ?></td>
                                            <td><?= $count->CPF ?></td>
                                            <td><?= $count->Celular ?></td>
                                            <td><?= $count->Telefone ?></td>
                                            <td><a href="site/contrato.php?idContratante=<? $count-> idContratante ?>" class="btn btn-outline-primary" title="Redirecionamento para página do contrato">Contrato</a>
                                            <a href="site/form.php?acao=update&idContratante=<? $count-> idContratante ?>" class="btn btn-outline-warning" title="Alteração dos dados do registro">Alterar</a>
                                            <a href="site/form.php?acao=delete&idContratante=<? $count-> idContratante ?>" class="btn btn-outline-danger" title="Exclusão do registro">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            Nenhum registro compatível, tente fazer outra pesquisa.
                                        </div>
                                    <?php
                                }
                        
                        } else {
                            foreach ($list as $count) {
                            ?>
                                <tr>
                                    <td><?= $count->Nome ?></td>
                                    <td><?= $count->CPF ?></td>
                                    <td><?= $count->RG ?></td>
                                    <td><?= $count->Celular ?></td>
                                    <td><?= $count->Telefone ?></td>
                                    <td>
                                        <a href="site/contrato.php?idContratante=<?= $count->idContratante ?>" class="btn btn-outline-primary" title="Redirecionamento para página do contrato">Contrato</a>
                                        <a href="site/form.php?acao=update&idContratante=<?= $count->idContratante ?>" class="btn btn-outline-warning" title="Alteração dos dados do registro">Alterar</a>
                                        <a href="site/form.php?acao=delete&idContratante=<?= $count->idContratante ?>" class="btn btn-outline-danger" title="Exclusão do registro">Excluir</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
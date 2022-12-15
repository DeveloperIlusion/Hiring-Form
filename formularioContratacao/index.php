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
            
            <h2 id="tituloLista">__Lista de Contratantes__</h2>
            
            <img src="assets/img/Logo Up Assistência Cor.png" id="logoUP" type="image/png">

            <form action="" method="GET" value="" id="formFiltro">
                <div  class="row" id="Filtro">
                    <div class="col-2" id="pBotaoCadastrar">
                        <a href="site/form.php?acao=insert" class="btn btn-outline-up" title="Cadastrar contratante" id="botaoCadastrar">Cadastrar</a>
                    </div>
                    <div class="col-6">

                    </div>
                    <div class="col-3" id="divInputFiltrar">
                        <input class="form-control" id="inputFiltrar" type="text" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>" placeholder="Digite o nome que deseja filtrar" autocomplete="off">
                    </div>
                    <div class="col-1" id="botaoFiltrar" >
                        <input class="btn btn-outline-up" type="submit" name="" value="Filtrar">
                    </div>
                </div>
            </form>

            <br>

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
                    try {        
                        $conn = new PDO(
                            "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                            "root",
                            ""
                        );

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
                            
                            $receber = $query-> fetchAll();

                            $result_count = $query -> fetchColumn();


                                if (!empty($receber) && is_array($receber)) {

                                    foreach ($receber as $row){
                                    ?>
                                        <tr>
                                            <td><?= $row['Nome'] ?></td>
                                            <td><?= $row['RG'] ?></td>
                                            <td><?= $row['CPF'] ?></td>
                                            <td><?= $row['Celular'] ?></td>
                                            <td><?= $row['Telefone'] ?></td>
                                            <td><a href="site/contrato.php?idContratante=<?= $row['idContratante'] ?>&FK_Endereco_Contratante=<?= $row['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $row['idContratante'] ?>&FK_Dependente_Contratante=<?= $row['idContratante'] ?>" class="btn btn-outline-primary" title="Redirecionamento para página do contrato">Contrato</a>
                                            <a href="site/form.php?acao=update&idContratante=<?= $row['idContratante'] ?>&FK_Endereco_Contratante=<?= $row['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $row['idContratante'] ?>&FK_Dependente_Contratante=<?= $row['idContratante'] ?>" class="btn btn-outline-warning" title="Alteração dos dados do registro">Alterar</a>
                                            <a href="site/form.php?acao=delete&idContratante=<?= $row['idContratante'] ?>&FK_Endereco_Contratante=<?= $row['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $row['idContratante'] ?>&FK_Dependente_Contratante=<?= $row['idContratante'] ?>" class="btn btn-outline-danger" title="Exclusão do registro">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    header("Location: index.php?msgError=Nenhum registro compatível, tente fazer outra pesquisa.");
                                }
                        
                        } else {
                            $dataTblContratante = $conn->query("SELECT * FROM contratante ORDER BY Nome");

                            foreach ($dataTblContratante as $value) {
                                ?>
                                <tr>
                                    <td><?= $value['Nome'] ?></td>
                                    <td><?= $value['CPF'] ?></td>
                                    <td><?= $value['RG'] ?></td>
                                    <td><?= $value['Celular'] ?></td>
                                    <td><?= $value['Telefone'] ?></td>
                                    <td>
                                        <a href="site/contrato.php?idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-primary" title="Redirecionamento para página do contrato">Contrato</a>
                                        <a href="site/form.php?acao=update&idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-warning" title="Alteração dos dados do registro">Alterar</a>
                                        <a href="site/form.php?acao=delete&idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-danger" title="Exclusão do registro">Excluir</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                  
                    } catch (PDOExCEPtion $pe) {
                        echo "ERROR: " . $pe->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
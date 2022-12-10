<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Contratantes</title>

        <link href="assets/css/style.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
    </head>
    <body>
        <div class="container"> 
            
            <h2>Lista de Contratantes</h2>

            <p>
                <a href="form.php?acao=insert" class="btn btn-outline-success" title="Cadastrar contratante">Cadastrar</a>
            </p>

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

            <table class="table table-responsive table-bordered table-striped table-sm">
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
                            "mysql:host=localhost;dbname=formulariocontratante",
                            "root",
                            ""
                        );

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
                                    <a href="../../index.php?idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-primary" title="Redirecionamento para página do contrato">Contrato</a>
                                    <a href="form.php?acao=update&idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-warning" title="Alteração dos dads do registro">Alterar</a>
                                    <a href="form.php?acao=delete&idContratante=<?= $value['idContratante'] ?>&FK_Endereco_Contratante=<?= $value['idContratante'] ?>&FK_PlanoContratado_Contratante=<?= $value['idContratante'] ?>&FK_Dependente_Contratante=<?= $value['idContratante'] ?>" class="btn btn-outline-danger" title="Exclusão do registro">Excluir</a>
                                </td>
                            </tr>
                            <?php
                        }

                    } catch (PDOException $pe) {
                        echo "ERROR: " . $pe->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
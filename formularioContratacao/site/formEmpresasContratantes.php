<?php
    $subMenu = [
        "insert" => "Cadastrar",
        "update" => "Alteração",
        "delete" => "Exclusão"
    ];

    $botao = [
        "insert" => "Cadastrar",
        "update" => "Alterar",
        "delete" => "Excluir"
    ];

    $dataTblContratante = [
        "idContratante" => 0,
        "Nome" => "",
        "CPF" => "",
        "RG" => "",
        "DataNascimento" => "",
        "Sexo" => "",
        "EstadoCivil" => 0,
        "Email" => "",
        "Profissao" => "",
        "Celular" => "",
        "Telefone" => ""
    ];

    $dataTblEndereco = [
        "idEndereco" => 0,
        "Endereco" => "",
        "Numero" => "",
        "Bairro" => "",
        "Cidade" => "",
        "Estado" => "",
        "CEP" => "",
        "FK_Endereco_Contratante" => 0
    ];

    $dataTblPlano = [
        "idPlano" => 0,
        "Plano" => ""
    ];

    $dataTblPlanoContratado = [
        "idPlanoContratado" => 0,
        "PlanoContratado" => 0,
        "MetodoCobranca" => 0,
        "Valor" => 0,
        "Vencimento" => "",
        "FK_PlanoContratado_Contratante" => 0
    ];

    $dataTblDependente = [
        "idDependente" => 0,
        "NomeDependente" => "",
        "DataNascimentoDependente" => "",
        "GrauParentesco" => "",
        "CPFDependente" => "",
        "FK_Dependente_Contratante" => 0
    ];

    if ($_GET['acao'] != "insert") {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                "root",
                ""
            );

            $dataTblContratante = $conn->prepare("SELECT * FROM contratante WHERE idContratante = ?");
            $rsc1 = $dataTblContratante->execute([$_GET["idContratante"]]);
            $dataTblContratante = $dataTblContratante->fetch();

            /* $dataTblEndereco = $conn->prepare("SELECT * FROM Endereco WHERE FK_Endereco_Contratante = ?");
            $rsc2 = $dataTblEndereco->execute([$_GET["FK_Endereco_Contratante"]]);
            $dataTblEndereco = $dataTblEndereco->fetch();

            $dataTblPlanoContratado = $conn->prepare("SELECT * FROM PlanoContratado WHERE FK_PlanoContratado_Contratante = ?");
            $rsc3 = $dataTblPlanoContratado->execute([$_GET["FK_PlanoContratado_Contratante"]]);
            $dataTblPlanoContratado = $dataTblPlanoContratado->fetch();

            $dataTblPlano = $conn->prepare("SELECT * FROM plano");
            $rsc4 = $dataTblPlano->execute();
            $dataTblPlano = $dataTblPlano->fetchAll();

            $dataTblDependente = $conn->prepare("SELECT * FROM dependente WHERE FK_Dependente_Contratante = ?");
            $rsc5 = $dataTblDependente->execute([$_GET["FK_Dependente_Contratante"]]);
            $dataTblDependente = $dataTblDependente->fetch();
 */
        } catch (PDOExCEPtion $pe) {
            echo "ERROR: " . $pe->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="icon" href="../assets/img/Logo Up Assistência Cor.png" type="image/png">
        <title>Formulário de Contratante</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
        <link href="../assets/css/styleForm.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">

            <h2 id="tituloInicio">__Formulário de Empresa Contratante - <?= $subMenu[$_GET['acao']] ?>__</h2>

            <form method="POST" action="<?= $_GET['acao'] ?>Contratante.php">

                <div class="row">
                    <div class="col-10">
                        <label for="RazaoSocial" class="form-label">Razão Social</label>
                        <input type="text" class="form-control" maxlength="11" name="RazaoSocial"  id="RazaoSocial" required>
                    </div>

                    <div class="col-2">
                        <label for="CNPJ" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" maxlength="11" name="CNPJ"  id="CNPJ" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="NomeFantasia" class="form-label">Nome Fantasia</label>
                        <input type="text" class="form-control" maxlength="10" name="NomeFantasia"  id="NomeFantasia" required>
                    </div>

                    <div class="col-3">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" maxlength="10" name="Telefone" id="Telefone" required>
                    </div>

                    <div class="col-3">
                        <label for="Celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" maxlength="50" name="Celular"  id="Celular" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9">
                        <label for="Endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" maxlength="100" name="Endereco"  id="Endereco" required>
                    </div>

                    <div class="col-3">
                        <label for="Numero" class="form-label">Nº</label>
                        <input type="text" class="form-control" maxlength="8" name="Numero"  id="Numero" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <label for="Bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" maxlength="30" name="Bairro"  id="Bairro" required>
                    </div>

                    <div class="col-3">
                        <label for="Cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" maxlength="30" name="Cidade"  id="Cidade" required>
                    </div>

                    <div class="col-2">
                        <label for="UF" class="form-label">UF</label>
                            <select name="UF" id="UF" class="form-control selectpicker" data-style="btn btn-link" required="">
                            <option value="" disabled="" selected=""></option>
                            <option value="1">AC</option>
                            <option value="2">AL</option>
                            <option value="3">AP</option>
                            <option value="4">AM</option>
                            <option value="5">BA</option>
                            <option value="6">CE</option>
                            <option value="7">DF</option>
                            <option value="8">ES</option>
                            <option value="9">GO</option>
                            <option value="10">MA</option>
                            <option value="11">MT</option>
                            <option value="12">MS</option>
                            <option value="13">MG</option>
                            <option value="14">PA</option>
                            <option value="15">PB</option>
                            <option value="16">PR</option>
                            <option value="17">PE</option>
                            <option value="18">PI</option>
                            <option value="19">RJ</option>
                            <option value="20">RN</option>
                            <option value="21">RS</option>
                            <option value="22">RO</option>
                            <option value="23">RR</option>
                            <option value="24">SC</option>
                            <option value="25">SP</option>
                            <option value="26">SE</option>
                            <option value="27">TO</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <label for="CEP" class="form-label">CEP</label>
                        <input type="text" class="form-control" maxlength="8" name="CEP"  id="CEP" required>
                    </div>
                </div>

                    
                <div class="row">
                    <div class="col-6">
                        <label for="Complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" maxlength="255" name="Complemento"  id="Complemento" required>
                    </div>

                    <div class="col-6">
                        <label for="Email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" maxlength="5" name="Email"  id="Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="RazaoResponsavelLegal" class="form-label">Razão do Responsável Legal</label>
                        <input type="text" class="form-control" maxlength="255" name="RazaoResponsavelLegal"  id="RazaoResponsavelLegal" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="PISorNIT" class="form-label">PIS/NIT</label>
                        <input type="text" class="form-control" maxlength="255" name="PISorNIT"  id="PISorNIT" required>
                    </div>

                    <div class="col-6">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" maxlength="5" name="CPF"  id="CPF" required>
                    </div>
                </div>
                               
                <input type="hidden" name="idContratante" id="idContratante">

                <div class="mt-3">

                    <div class="col-auto">
                        <a href="listaEmpresasContratantes.php" class="btn btn-outline-secondary btn-sm mb-3">Voltar</a>
                        
                        <?php
                        if ($_GET['acao'] != "view") {
                            ?>
                            <button type="submit" class="btn btn-outline-dark btn-sm mb-3"><?= $botao[$_GET['acao']] ?></button>
                            <?php
                        }
                        ?>
                    </div>
                </div>          
            </form>
        </div>
    </body>
</html>
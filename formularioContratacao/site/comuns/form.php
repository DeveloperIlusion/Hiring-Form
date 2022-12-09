<?php

    $subMenu = [
        "insert" => "Cadastrar",
        "update" => "Alteração",
        "delete" => "Exclusão"
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

            $dataTblEndereco = $conn->prepare("SELECT * FROM endereco WHERE FK_Endereco_Contratante = ?");
            $rsc2 = $dataTblEndereco->execute([$_GET["FK_Endereco_Contratante"]]);
            $dataTblEndereco = $dataTblEndereco->fetch();

            $dataTblPlano = $conn->prepare("SELECT * FROM plano");
            $rsc3 = $dataTblPlano->execute();
            $dataTblPlano = $dataTblPlano->fetch();

            $dataTblPlanoContratado = $conn->prepare("SELECT * FROM planoContratado");
            $rsc4 = $dataTblPlanoContratado->execute();
            $dataTblPlanoContratado = $dataTblPlanoContratado->fetch();

        } catch (PDOException $pe) {
            echo "ERROR: " . $pe->getMessage();
        }

        echo "<pre>";
        print_r($dataTblPlano);
        echo "</pre>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Formulário de Contratante</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
    </head>

    <body>
        <div class="container">

            <h2>Formulário de Contratante - <?= $subMenu[$_GET['acao']] ?></h2>

            <form method="POST" action="<?= $_GET['acao'] ?>Contratante.php">

                <div class="row">
                    <div class="col-10">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" maxlength="255" name="Nome"  id="Nome" value="<?= $dataTblContratante['Nome'] ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="PlanoContratado" class="form-label">Plano contratado</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" maxlength="30" name="CPF"  id="CPF" value="<?= $dataTblContratante['CPF'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="RG" class="form-label">RG</label>
                        <input type="text" class="form-control" maxlength="30" name="RG"  id="RG" value="<?= $dataTblContratante['RG'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="DataNascimento" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" maxlength="10" name="DataNascimento"  id="DataNascimento" value="<?= $dataTblContratante['DataNascimento'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Profissao" class="form-label">Profissão</label>
                        <input type="text" class="form-control" maxlength="10" name="Profissao"  id="Profissao" value="<?= $dataTblContratante['Profissao'] ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <label for="Endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" maxlength="30" name="Endereco"  id="Endereco" value="<?= $dataTblEndereco['Endereco'] ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="Numero" class="form-label">Nº da residência</label>
                        <input type="text" class="form-control" maxlength="30" name="Numero"  id="Numero" value="<?= $dataTblEndereco['Numero'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" maxlength="30" name="Bairro"  id="Bairro" value="<?= $dataTblEndereco['Bairro'] ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9" id="multiplaEscolha"> <span>Sexo:</span>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="sexoMasculino">
                                Masculino
                            </label>
                            <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="M">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="sexoFeminino">
                                Feminino
                            </label>
                            <input class="form-check-input" type="radio" name="sexo" id="sexoFeminino" value="F">
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="sexoNaoBinario">
                                Não-binário
                            </label>
                        <input class="form-check-input" type="radio" name="sexo" id="sexoNaoBinario" value="N/B">
                    </div>
                    <div class="col-3">
                        <label for="Celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" maxlength="30" name="Celular"  id="Celular" value="<?= $dataTblContratante['Celular'] ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="Cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" maxlength="30" name="Cidade"  id="Cidade" value="<?= $dataTblEndereco['Cidade'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
                            <option value="" disabled="" selected=""></option>
                            <option value="1">Acre</option>
                            <option value="2">Alagoas</option>
                            <option value="3">Amapá</option>
                            <option value="4">Amazonas</option>
                            <option value="5">Bahia</option>
                            <option value="6">Ceará</option>
                            <option value="7">Distrito Federal</option>
                            <option value="8">Espírito Santo</option>
                            <option value="9">Goiás</option>
                            <option value="10">Maranhão</option>
                            <option value="11">Mato Grosso</option>
                            <option value="12">Mato Grosso do Sul</option>
                            <option value="13">Minas Gerais</option>
                            <option value="14">Pará</option>
                            <option value="15">Paraíba</option>
                            <option value="16">Paraná</option>
                            <option value="17">Pernambuco</option>
                            <option value="18">Piauí</option>
                            <option value="19">Rio de Janeiro</option>
                            <option value="20">Rio Grande do Norte</option>
                            <option value="21">Rio Grande do Sul</option>
                            <option value="22">Rondônia</option>
                            <option value="23">Roraima</option>
                            <option value="24">Santa Catarina</option>
                            <option value="25">São Paulo</option>
                            <option value="26">Sergipe</option>
                            <option value="27">Tocantins</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <label for="CEP" class="form-label">CEP</label>
                        <input type="text" class="form-control" maxlength="30" name="CEP"  id="CEP" value="<?= $dataTblEndereco['CEP'] ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" maxlength="30" name="Telefone"  id="Telefone" value="<?= $dataTblContratante['Telefone'] ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="Endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" maxlength="30" name="Endereco"  id="Endereco" value="<?= $dataTblEndereco['Endereco'] ?>" required>
                    </div>

                    <div class="col-6">
                        <label for="Numero" class="form-label">Nº da residência</label>
                        <input type="text" class="form-control" maxlength="30" name="Numero"  id="Numero" value="<?= $dataTblEndereco['Numero'] ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="Vencimento" class="form-label">Vencimento</label>
                        <input type="date" class="form-control" maxlength="30" name="Vencimento"  id="Vencimento" value="<?= $dataTblPlanoContratado['Vencimento'] ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="EstadoCivil" class="form-label">Estado Civil</label>
                        <input type="text" class="form-control" maxlength="30" name="EstadoCivil"  id="EstadoCivil" value="<?= $dataTblContratante['EstadoCivil'] ?>" required>
                    </div>

                    <div class="col-7">
                        <label for="Email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" maxlength="30" name="Email"  id="Email" value="<?= $dataTblContratante['Email'] ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="Valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" maxlength="30" name="Valor"  id="Valor" value="<?= $dataTblPlano['Valor'] ?>" required>
                    </div>
                </div>
                

                <input type="hidden" name="idContratante" id="idContratante" value="<?= $dataTblContratante['idContratante'] ?>">

                <div class="mt-3">

                    <div class="col-auto">
                        <a href="lista.php" class="btn btn-outline-secondary btn-sm mb-3">Voltar</a>
                        
                        <?php
                        if ($_GET['acao'] != "view") {
                            ?>
                            <button type="submit" class="btn btn-outline-dark btn-sm mb-3">Gravar</button>
                            <?php
                        }
                        ?>
                    </div>
                </div>          
            </form>
        </div>
    </body>
</html>
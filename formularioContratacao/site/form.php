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

    require __DIR__ . "/../vendor/autoload.php";

    use CoffeeCode\DataLayer\Connect;
    use Source\Models\Contractor;
    use Source\Models\Address;

    $conn = Connect::getInstance();
    $error = Connect::getError();

    if ($error){
        echo $error->getMessage();
        die();
    }

    if ($_GET['acao'] == "insert") {
       $contractor = new Contractor();
    } else {
        $contractor = (new Contractor())->findById($_GET['idContratante']);
        $address = (new Address())->find("FK_Endereco_Contratante", $_GET['idContratante'], "*");
        print_r($address);

        foreach ($address as $row){
            print_r($row);
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

            <h2 id="tituloInicio">__Formulário de Contratante - <?= $subMenu[$_GET['acao']] ?>__</h2>

            <form method="POST" action="<?= $_GET['acao'] ?>Contratante.php">

                <div class="row">
                    <div class="col-12">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" maxlength="255" name="Nome"  id="Nome" value="<?= $contractor -> Nome ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" maxlength="11" name="CPF"  id="CPF" value="<?= $contractor -> CPF ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="RG" class="form-label">RG</label>
                        <input type="text" class="form-control" maxlength="10" name="RG"  id="RG" value="<?= $contractor -> RG ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="DataNascimento" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" maxlength="10" name="DataNascimento"  id="DataNascimento" value="<?= $contractor -> DataNascimento ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Profissao" class="form-label">Profissão</label>
                        <input type="text" class="form-control" maxlength="50" name="Profissao"  id="Profissao" value="<?= $contractor -> Profissao ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-7">
                        <label for="Endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" maxlength="100" name="Endereco"  id="Endereco" value="<?= $row -> Endereco ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="Numero" class="form-label">Nº da residência</label>
                        <input type="text" class="form-control" maxlength="8" name="Numero"  id="Numero" value="<?= $address -> Numero ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" maxlength="30" name="Bairro"  id="Bairro" value="<?= $address -> Bairro ?>" required>
                    </div>
                </div>

                <div class="row" id="problemaAlinhamento">
                    <div class="col-9">
                        <label for="Sexo" class="form-label">Sexo</label>
                        <div id="multiplaEscolha" class="form-control">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="SexoMasculino">
                                Masculino
                            </label>
                            <input class="form-check-input" type="radio" name="Sexo" id="SexoMasculino" value="M" <?= ($contractor -> Sexo == "M" ? "checked" : "") ?> required>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="SexoFeminino">
                                Feminino
                            </label>
                            <input class="form-check-input" type="radio" name="Sexo" id="SexoFeminino" value="F" <?= ($contractor -> Sexo == "F" ? "checked" : "") ?> required>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="SexoNaoBinario">
                                Não-binário
                            </label>
                            <input class="form-check-input" type="radio" name="Sexo" id="SexoNaoBinario" value="N/B" <?= ($contractor -> Sexo == "N/B" ? "checked" : "") ?> required>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <label for="Celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" maxlength="13" name="Celular"  id="Celular" value="<?= $contractor -> Celular ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="Cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" maxlength="30" name="Cidade"  id="Cidade" value="<?= $address -> Cidade ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Estado" class="form-label">Estado</label>
                            <select name="Estado" id="Estado" class="form-control selectpicker" data-style="btn btn-link" required="">
                            <option value="" disabled="" selected=""></option>
                            <option <?= ($contractor -> Estado == "1" ? "selected" : "") ?> value="1">Acre</option>
                            <option <?= ($contractor -> Estado == "2" ? "selected" : "") ?> value="2">Alagoas</option>
                            <option <?= ($contractor -> Estado == "3" ? "selected" : "") ?> value="3">Amapá</option>
                            <option <?= ($contractor -> Estado == "4" ? "selected" : "") ?> value="4">Amazonas</option>
                            <option <?= ($contractor -> Estado == "5" ? "selected" : "") ?> value="5">Bahia</option>
                            <option <?= ($contractor -> Estado == "6" ? "selected" : "") ?> value="6">Ceará</option>
                            <option <?= ($contractor -> Estado == "7" ? "selected" : "") ?> value="7">Distrito Federal</option>
                            <option <?= ($contractor -> Estado == "8" ? "selected" : "") ?> value="8">Espírito Santo</option>
                            <option <?= ($contractor -> Estado == "9" ? "selected" : "") ?> value="9">Goiás</option>
                            <option <?= ($contractor -> Estado == "10" ? "selected" : "") ?> value="10">Maranhão</option>
                            <option <?= ($contractor -> Estado == "11" ? "selected" : "") ?> value="11">Mato Grosso</option>
                            <option <?= ($contractor -> Estado == "12" ? "selected" : "") ?> value="12">Mato Grosso do Sul</option>
                            <option <?= ($contractor -> Estado == "13" ? "selected" : "") ?> value="13">Minas Gerais</option>
                            <option <?= ($contractor -> Estado == "14" ? "selected" : "") ?> value="14">Pará</option>
                            <option <?= ($contractor -> Estado == "15" ? "selected" : "") ?> value="15">Paraíba</option>
                            <option <?= ($contractor -> Estado == "16" ? "selected" : "") ?> value="16">Paraná</option>
                            <option <?= ($contractor -> Estado == "17" ? "selected" : "") ?> value="17">Pernambuco</option>
                            <option <?= ($contractor -> Estado == "18" ? "selected" : "") ?> value="18">Piauí</option>
                            <option <?= ($contractor -> Estado == "19" ? "selected" : "") ?> value="19">Rio de Janeiro</option>
                            <option <?= ($contractor -> Estado == "20" ? "selected" : "") ?> value="20">Rio Grande do Norte</option>
                            <option <?= ($contractor -> Estado == "21" ? "selected" : "") ?> value="21">Rio Grande do Sul</option>
                            <option <?= ($contractor -> Estado == "22" ? "selected" : "") ?> value="22">Rondônia</option>
                            <option <?= ($contractor -> Estado == "23" ? "selected" : "") ?> value="23">Roraima</option>
                            <option <?= ($contractor -> Estado == "24" ? "selected" : "") ?> value="24">Santa Catarina</option>
                            <option <?= ($contractor -> Estado == "25" ? "selected" : "") ?> value="25">São Paulo</option>
                            <option <?= ($contractor -> Estado == "26" ? "selected" : "") ?> value="26">SeRGipe</option>
                            <option <?= ($contractor -> Estado == "27" ? "selected" : "") ?> value="27">Tocantins</option>
                        </select>
                    </div>

                    <div class="col-3">
                        <label for="CEP" class="form-label">CEP</label>
                        <input type="text" class="form-control" maxlength="8" name="CEP"  id="CEP" value="<?= $address -> CEP ?>" required>
                    </div>

                    <div class="col-3">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" maxlength="13" name="Telefone"  id="Telefone" value="<?= $contractor -> Telefone ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="idPlano" class="form-label">Plano contratado</label>
                            <select name="idPlano" id="idPlano" class="form-control" required>
                            <option value=""  <?= (isset($dataTblPlanoContratado['PlanoContratado']) ? ($dataTblPlanoContratado['PlanoContratado'] == 0 ? "selected" : "") : "") ?>>...</option>
                            
                            <?php foreach ($dataTblPlano as $value): ?>
                                <option value="<?= $value['idPlano'] ?>" <?= (isset($dataTblPlanoContratado['PlanoContratado']) ? ($dataTblPlanoContratado['PlanoContratado'] == $value['idPlano'] ? "selected" : "") : "") ?>><?= $value['Plano'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="MetodoCobranca" class="form-label">Método de cobrança</label>
                        <div class="form-control" id="multiplaEscolha">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="cartaoCredito">
                                    Cartão de crédito
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="cartaoCredito" value="1" <?= ($contractor -> MetodoCobranca == "1" ? 'checked="checked"' : "") ?> required>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="Energisa">
                                    Energisa
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="Energisa" value="2" <?= ($contractor -> MetodoCobranca == "2" ? 'checked="checked"' : "") ?> required>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="SexoNaoBinario">
                                    Carnê
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="SexoNaoBinario" value="3" <?= ($contractor -> MetodoCobranca == "3" ? 'checked="checked"' : "") ?> required>
                            </div>
                        </div>
                    </div>                    

                    <div class="col-2">
                        <label for="Vencimento" class="form-label">Vencimento</label>
                        <input type="date" class="form-control" maxlength="10" name="Vencimento"  id="Vencimento" value="<?= $contractor -> Vencimento ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="EstadoCivil" class="form-label">Estado Civil</label>
                        <select name="EstadoCivil" id="EstadoCivil" class="form-control selectpicker" data-style="btn btn-link" required="">
                            <option value="" disabled="" selected=""></option>
                            <option <?= ($contractor -> EstadoCivil == "1" ? "selected" : "") ?> value="1">Solteiro</option>
                            <option <?= ($contractor -> EstadoCivil == "2" ? "selected" : "") ?> value="2">Noivo</option>
                            <option <?= ($contractor -> EstadoCivil == "3" ? "selected" : "") ?> value="3">Casado</option>
                            <option <?= ($contractor -> EstadoCivil == "4" ? "selected" : "") ?> value="4">Divorciado</option>
                            <option <?= ($contractor -> EstadoCivil == "5" ? "selected" : "") ?> value="5">Viúvo</option>
                        </select>
                    </div>

                    <div class="col-7">
                        <label for="Email" class="form-label">E-mail</label>
                        <input type="Email" class="form-control" maxlength="255" name="Email"  id="Email" value="<?= $contractor -> Email ?>" required>
                    </div>

                    <div class="col-2">
                        <label for="Valor" class="form-label">Valor</label>
                        <input type="number" class="form-control" maxlength="5" name="Valor"  id="Valor" value="<?= $contractor -> Valor ?>" required>
                    </div>
                </div>
                
                <br>
                
                <?php 
                    if (isset($dataTblDependente['FK_Dependente_Contratante']) && ($_GET['acao'] != "insert")) {

                        ?><h4>Dependentes</h4><?php

                        $quantidadeDependentes = $conn->prepare("SELECT * FROM dependente WHERE FK_Dependente_Contratante = ?");
                        $conversor = $quantidadeDependentes->execute([$_GET["idContratante"]]);
                        $quantidadeDependentes = $quantidadeDependentes->fetchAll();

                        foreach ($quantidadeDependentes as $dataTblDependente) {
                            $count = 0;
                            $count = $count +1;
                        ?><div class="row">
                                <input type="hidden" class="form-control" name="idDependente[]"  id="idDependente" 
                                    <?php 
                                    if (isset($dataTblDependente['idDependente'])) {$idDependente = $dataTblDependente['idDependente'];
                                    } else {
                                        $idDependente = "";
                                    }
                                ?> value="<?= $idDependente ?>">

                            <div class="col-5">
                                <label for="NomeDependente" class="form-label">Nome</label>
                                <input type="text" class="form-control" maxlength="255" name="NomeDependente[]"  id="NomeDependente" 
                                    <?php 
                                    if (isset($dataTblDependente['NomeDependente'])) {$NomeDependente = $dataTblDependente['NomeDependente'];
                                    } else {
                                        $NomeDependente = "";
                                    }
                                ?> value="<?= $NomeDependente ?>">
                            </div>

                            <div class="col-2">
                                <label for="DataNascimentoDependente" class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" maxlength="10" name="DataNascimentoDependente[]"  id="DataNascimentoDependente" 
                                <?php 
                                    if (isset($dataTblDependente['DataNascimentoDependente'])) {$DataNascimentoDendente = $dataTblDependente['DataNascimentoDependente'];
                                    } else {
                                        $DataNascimentoDendente = "";
                                    }
                                ?> value="<?= $DataNascimentoDendente ?>">
                            </div>

                            <div class="col-2">
                                <label for="GrauParentesco" class="form-label">Grau de parentesco</label>
                                <input type="text" class="form-control" maxlength="20" name="GrauParentesco[]"  id="GrauParentesco" 
                                <?php 
                                    if (isset($dataTblDependente['GrauParentesco'])) {$dataGrauParentesco = $dataTblDependente['GrauParentesco'];
                                    } else {
                                        $dataGrauParentesco = "";
                                    }
                                ?> value="<?= $dataGrauParentesco ?>">
                            </div>

                            <div class="col-3">
                                <label for="CPFDependente" class="form-label">CPF</label>
                                <input type="text" class="form-control" maxlength="13" name="CPFDependente[]"  id="CPFDependente" 
                                <?php 
                                    if (isset($dataTblDependente['CPFDependente'])) {$dataCPF = $dataTblDependente['CPFDependente'];
                                    } else {
                                        $dataCPF = "";
                                    }
                                ?> value="<?= $dataCPF ?>">
                            </div>
                          </div>
                            <?php
                            }
                        } elseif ($_GET['acao'] == "insert") {
                            ?><h4>Dependentes</h4><?php
                                $count = 0;
                                while ($count < 10) {
                                    $count = $count + 1;
                                ?>
                                <div class="row">
                                    <input type="hidden" class="form-control" maxlength="30" name="idDependente[]"  id="idDependente">

                                    <div class="col-5">
                                        <label for="NomeDependente" class="form-label">Nome</label>
                                        <input type="text" class="form-control" maxlength="255" name="NomeDependente[]"  id="NomeDependente">
                                    </div>

                                    <div class="col-2">
                                        <label for="DataNascimentoDependente" class="form-label">Data de nascimento</label>
                                        <input type="date" class="form-control" maxlength="10" name="DataNascimentoDependente[]"  id="DataNascimentoDependente">
                                    </div>

                                    <div class="col-2">
                                        <label for="GrauParentesco" class="form-label">Grau de parentesco</label>
                                        <input type="text" class="form-control" maxlength="20" name="GrauParentesco[]"  id="GrauParentesco">
                                    </div>

                                    <div class="col-3">
                                        <label for="CPFDependente" class="form-label">CPF</label>
                                        <input type="text" class="form-control" maxlength="13" name="CPFDependente[]"  id="CPFDependente">
                                    </div>
                                </div>
                            <?php 
                            }}
                        ?>
                        </div>

                
                <?php if ($_GET['acao'] != "insert"){
                ?>
                    <input type="hidden" name="idContratante" id="idContratante" value="<?= $_GET['idContratante'] ?>">
                <?php
                    }
                ?>


                <div class="mt-3">

                    <div class="col-auto container">
                        <a href="../index.php" class="btn btn-outline-secondary btn-sm mb-3">Voltar</a>
                        
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
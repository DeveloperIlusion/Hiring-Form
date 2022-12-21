<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contrato</title>
    <link rel="icon" href="../assets/img/Logo Up Assistência Cor.png" type="image/png">

    <link href="../assets/css/styleContrato.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
            require __DIR__ . "/../Controllers/read.php";

            use Source\Models\Contractor;
            use Source\Models\Address;
            use Source\Models\ContractedPlan;
            use Source\Models\Dependent;
            use Source\Models\Plan;

            $contractor = (new Contractor())->findById($_GET['idContratante']);
            $address = (new Address())->find("FK_Endereco_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
            $contractedPlan = (new ContractedPlan())->find("FK_PlanoContratado_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
            $dependent = (new Dependent())->find("FK_Dependente_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
            $plan = (new Plan())->find()->fetch(true);  
        ?>
    </header>
    <main>
        <br>
        <div id="cabecalho">
            <img src="../assets/img/Logo Up Assistência Cor.png" id="logoUP">
            <p><b>
                    UP Plano de Assistência Familiar LTDA
                    <br>CNPJ: 29.443.344/0001-57
                    <br>Endereço: Avenida Constantino Pinto, 104, Centro, Muriaé - MG
                    <br>CEP: 36.880-003
                    <br>Telefones: (32) 3729-1015
                </b></p>
        </div>
        <div class="container" id="formulario">
            <form method="POST">
                <div id="contratante">
                    <div class="row" id="titulo">
                        <label class="col-mb-12">Dados do Proponente Titular/Contratante</label>
                    </div>

                    <div class="row">
                    <div class="col-10" id="ajustes">
                            <label for="Nome">Nome:
                                <input type="text" id="Nome" name="Nome" size="130%" maxlength="255" value="<?= $contractor -> Nome ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="contratoNumero">Contrato Nº:
                                <input type="text" id="contratoNumero" size="6%" name="contratoNumero" value="<?= $contractor -> idContratante ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="CPF">CPF:
                                <input type="text" id="CPF" name="CPF" size="50%" maxlength="11" value="<?= $contractor -> CPF ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="RG">RG:
                                <input type="text" id="RG" name="RG" maxlength="10" value="<?= $contractor -> RG ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="DataNascimento">Data de Nascimento:
                                <input type="text" id="DataNascimento" name="DataNascimento" maxlength="10" value="<?= $contractor -> DataNascimento ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Profissao">Profissão:
                                <input type="text" id="Profissao" name="Profissao" size="22%" maxlength="50" value="<?= $contractor -> Profissao ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7" id="ajustes">
                            <label for="Endereco">Endereço:
                                <input type="text" id="Endereco" name="Endereco" size="76%" maxlength="100" value="<?= $address -> Endereco ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="Numero">Nº:
                                <input type="text" id="Numero" name="Numero" maxlength="8" value="<?= $address -> Numero ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Bairro">Bairro:
                                <input type="text" id="Bairro" name="Bairro" size="25%" maxlength="30" value="<?= $address -> Bairro ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9" id="multiplaEscolha"> <span>Sexo:</span>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="SexoMasculino">
                                    Masculino
                                </label>
                                <input class="form-check-input" type="radio" name="Sexo" id="SexoMasculino" value="M" <?= ($contractor -> Sexo == "M" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="SexoFeminino">
                                    Feminino
                                </label>
                                <input class="form-check-input" type="radio" name="Sexo" id="SexoFeminino" value="F" <?= ($contractor -> Sexo == "F" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="SexoNaoBinario">
                                    Não-binário
                                </label>
                                <input class="form-check-input" type="radio" name="Sexo" id="SexoNaoBinario" value="N/B" <?= ($contractor -> Sexo == "N/B" ? "checked" : "") ?>>
                            </div>
                            </div>
                        <div class="col-3" id="ajustes">
                            <label for="Celular">Celular:
                                <input type="text" id="Celular" name="Celular" size="24%" maxlength="13" value="<?= $contractor -> Celular ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="Cidade">Cidade:
                                <input type="text" id="Cidade" name="Cidade" size="50%" maxlength="30" value="<?= $address -> Cidade ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Estado">Estado:
                                <select name="Estado" id="Estado" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
                                    <option value="" disabled="" selected=""></option>
                                    <option <?= ($address  -> Estado == "1" ? "selected" : "") ?> value="1">Acre</option>
                                    <option <?= ($address -> Estado == "2" ? "selected" : "") ?> value="2">Alagoas</option>
                                    <option <?= ($address -> Estado == "3" ? "selected" : "") ?> value="3">Amapá</option>
                                    <option <?= ($address -> Estado == "4" ? "selected" : "") ?> value="4">Amazonas</option>
                                    <option <?= ($address -> Estado == "5" ? "selected" : "") ?> value="5">Bahia</option>
                                    <option <?= ($address -> Estado == "6" ? "selected" : "") ?> value="6">Ceará</option>
                                    <option <?= ($address -> Estado == "7" ? "selected" : "") ?> value="7">Distrito Federal</option>
                                    <option <?= ($address -> Estado == "8" ? "selected" : "") ?> value="8">Espírito Santo</option>
                                    <option <?= ($address -> Estado == "9" ? "selected" : "") ?> value="9">Goiás</option>
                                    <option <?= ($address -> Estado == "10" ? "selected" : "") ?> value="10">Maranhão</option>
                                    <option <?= ($address -> Estado == "11" ? "selected" : "") ?> value="11">Mato Grosso</option>
                                    <option <?= ($address -> Estado == "12" ? "selected" : "") ?> value="12">Mato Grosso do Sul</option>
                                    <option <?= ($address -> Estado == "13" ? "selected" : "") ?> value="13">Minas Gerais</option>
                                    <option <?= ($address -> Estado == "14" ? "selected" : "") ?> value="14">Pará</option>
                                    <option <?= ($address -> Estado == "15" ? "selected" : "") ?> value="15">Paraíba</option>
                                    <option <?= ($address -> Estado == "16" ? "selected" : "") ?> value="16">Paraná</option>
                                    <option <?= ($address -> Estado == "17" ? "selected" : "") ?> value="17">Pernambuco</option>
                                    <option <?= ($address -> Estado == "18" ? "selected" : "") ?> value="18">Piauí</option>
                                    <option <?= ($address -> Estado == "19" ? "selected" : "") ?> value="19">Rio de Janeiro</option>
                                    <option <?= ($address -> Estado == "20" ? "selected" : "") ?> value="20">Rio Grande do Norte</option>
                                    <option <?= ($address -> Estado == "21" ? "selected" : "") ?> value="21">Rio Grande do Sul</option>
                                    <option <?= ($address -> Estado == "22" ? "selected" : "") ?> value="22">Rondônia</option>
                                    <option <?= ($address -> Estado == "23" ? "selected" : "") ?> value="23">Roraima</option>
                                    <option <?= ($address -> Estado == "24" ? "selected" : "") ?> value="24">Santa Catarina</option>
                                    <option <?= ($address -> Estado == "25" ? "selected" : "") ?> value="25">São Paulo</option>
                                    <option <?= ($address -> Estado == "26" ? "selected" : "") ?> value="26">SeRGipe</option>
                                    <option <?= ($address -> Estado == "27" ? "selected" : "") ?> value="27">Tocantins</option>
                                </select>
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="CEP">CEP:
                                <input type="text" id="CEP" name="CEP" maxlength="8" value="<?= $address -> CEP ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Telefone">Telefone:
                                <input type="text" id="Telefone" name="Telefone" size="23%" maxlength="13" value="<?= $contractor -> Telefone ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="idPlano">Plano Contratado:
                                <select name="idPlano" id="idPlano" class="form-control" required>
                                    <option value=""  <?= (isset($contractedPlan -> PlanoContratado) ? ($contractedPlan -> PlanoContratado == 0 ? "selected" : "") : "") ?>>...</option>
                                    
                                    <?php foreach ($plan as $value): ?>
                                        <option value="<?= $value->idPlano ?>" <?= (isset($contractedPlan -> PlanoContratado) ? ($contractedPlan -> PlanoContratado == $value->idPlano ? "selected" : "") : "") ?>><?= $value->Plano ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                        <div class="col-6" id="multiplaEscolha"><span>Método Cobrança:</span>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="cartaoCredito">
                                    Cartão de crédito
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="cartaoCredito" value="1" <?= ($contractedPlan -> MetodoCobranca == "1" ? "checked" : "") ?> required>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="Energisa">
                                    Energisa
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="Energisa" value="2" <?= ($contractedPlan -> MetodoCobranca == "2" ? "checked" : "") ?> required>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="Carne">
                                    Carnê
                                </label>
                                <input class="form-check-input" type="radio" name="MetodoCobranca" id="Carne" value="3" <?= ($contractedPlan -> MetodoCobranca == "3" ? "checked" : "") ?> required>
                            </div>
                        </div>

                        <div class="col-2" id="ajustes">
                            <label for="Vencimento">Vencimento:
                                <input type="data" id="Vencimento" name="Vencimento" size="7%" maxlength="10" value="<?= $contractedPlan -> Vencimento ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3" id="ajustes">
                            <label for="EstadoCivil">Estado Civil:
                                <select name="EstadoCivil" id="EstadoCivil" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
                                    <option value="" disabled="" selected=""></option>
                                    <option <?= ($contractor -> EstadoCivil == "1" ? "selected" : "") ?> value="1">Solteiro</option>
                                    <option <?= ($contractor -> EstadoCivil == "2" ? "selected" : "") ?> value="2">Noivo</option>
                                    <option <?= ($contractor -> EstadoCivil == "3" ? "selected" : "") ?> value="3">Casado</option>
                                    <option <?= ($contractor -> EstadoCivil == "4" ? "selected" : "") ?> value="4">Divorciado</option>
                                    <option <?= ($contractor -> EstadoCivil == "5" ? "selected" : "") ?> value="5">Viúvo</option>
                                </select>                            
                            </label>
                        </div>
                        <div class="col-7" id="ajustes">
                            <label for="Email">E-mail:
                                <input type="Email" id="Email" name="Email" size="76%" maxlength="255" value="<?= $contractor -> Email ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="Valor">Valor:
                                <input type="number" id="Valor" name="Valor" size="3%" maxlength="5" value="<?= $contractedPlan -> Valor ?>">
                            </label>
                        </div>
                    </div>
                </div>

                <div id="dependentes">
                    <div class="row" id="titulo">
                        <label class="col-mb-12">Dependentes</label>
                    </div>

                    <div class="row" id="cabecalhoDependentes">
                        <label class="col-5 NomeColunaDependentes1">NOME</label>
                        <label class="col-2 NomeColunaDependentes1 NomeColunaDependentes2">DATA DE NASCIMENTO </label>
                        <label class="col-2 NomeColunaDependentes1 NomeColunaDependentes2">GRAU DE PARENTESCO</label>
                        <label class="col-3 NomeColunaDependentes2">CPF</label>
                    </div>
                    
                    <?php 
                        if (isset($dependent -> FK_Dependente_Contratante)) {

                            $quantidadeDependentes = $conn->query("SELECT * FROM dependente WHERE FK_Dependente_Contratante = {$_GET["idContratante"]}")->fetchAll();

                            foreach ($quantidadeDependentes as $dependent) {
                                $count = 1;
                                $count = $count +1;
                        ?><div class="row">
                            <input type="hidden" class="form-control" name="idDependente[]"  id="idDependente" 
                                    <?php 
                                    if (isset($dependent->idDependente)) {$idDependente = $dependent->idDependente;
                                    } else {
                                        $idDependente = "";
                                    }
                                ?> value="<?= $idDependente ?>">

                            <input type="text" id="NomeDependente" name="NomeDependente[]" class="col-5  ajustes" maxlength="255" placeholder="Nome:" 
                                <?php 
                                    if (isset($dependent-> NomeDependente)) {$NomeDependente = $dependent-> NomeDependente;
                                    } else {
                                        $NomeDependente = "";
                                    }
                                ?> value="<?= $NomeDependente ?>">

                            <input type="date" id="DataNascimentoDependente" name="DataNascimentoDependente[]" class="col-2 ajustes" maxlength="10" placeholder="Data de nascimento:" 
                                <?php 
                                    if (isset($dependent -> DataNascimentoDependente)) {$DataNascimentoDendente = $dependent -> DataNascimentoDependente;
                                    } else {
                                        $DataNascimentoDependente = "";
                                    }
                                ?> value="<?= $DataNascimentoDendente ?>">

                            <input type="text" id="GrauParentesco" name="GrauParentesco[]" class="col-2 ajustes" maxlength="20" placeholder="Grau de parentesco:" 
                            <?php 
                                if (isset($dependent -> GrauParentesco)) {$dataGrauParentesco = $dependent -> GrauParentesco;
                                } else {
                                    $dataGrauParentesco = "";
                                }
                            ?> value="<?= $dataGrauParentesco ?>">

                            <input type="text" id="CPFDependente" name="CPFDependente[]" class="col-3 ajustes" maxlength="13" placeholder="CPF:"
                            <?php 
                                if (isset($dependent -> CPFDependente)) {$CPFDependente = $dependent -> CPFDependente;
                                } else {
                                    $CPFDependente = "";
                                }
                            ?> value="<?= $CPFDependente ?>">
                        </div>
                        <?php
                        }; 
                        while ($count < 10) {
                            $count = $count + 1;
                            ?>
                            <div class="row">
                                <input type="hidden" id="idDependente" name="idDependente[]" class="form-control">

                                <input type="text" id="NomeDependente" name="NomeDependente[]" class="col-5  ajustes" maxlength="255" placeholder="Nome:">
                                
                                <input type="date" id="DataNascimentoDependente" name="DataNascimentoDependente[]" class="col-2 ajustes" maxlength="10" placeholder="Data de nascimento:">
                                
                                <input type="text" id="GrauParentesco" name="GrauParentesco[]" class="col-2 ajustes" maxlength="20" placeholder="Grau de parentesco:">
                                
                                <input type="text" id="CPFDependente" name="CPFDependente[]" class="col-3 ajustes" maxlength="13" placeholder="CPF:">
                            </div>
                        <?php 
                        }} else {
                            $count = 0;
                            while ($count < 10) {
                                $count = $count + 1;
                                ?>
                                <div class="row">
                                    <input type="hidden" id="idDependente" name="idDependente[]" class="form-control">

                                    <input type="text" id="NomeDependente" name="NomeDependente[]" class="col-5  ajustes" maxlength="255" placeholder="Nome:">
                                    
                                    <input type="date" id="DataNascimentoDependente" name="DataNascimentoDependente[]" class="col-2 ajustes" maxlength="10" placeholder="Data de nascimento:">
                                    
                                    <input type="text" id="GrauParentesco" name="GrauParentesco[]" class="col-2 ajustes" maxlength="20" placeholder="Grau de parentesco:">
                                    
                                    <input type="text" id="CPFDependente" name="CPFDependente[]" class="col-3 ajustes" maxlength="13" placeholder="CPF:">
                                </div>
                            <?php 
                        }}
                        ?>
                </div>

                <div id="texto1" class="row">
                    <p id="paragrafo1"><b>Os planos de Assistência Familiar são denominados e discriminados da seguinte forma:</b></p>
                    <p id="paragrafo2">
                        BÁSICO: Este plano oferece cobertura ao titular e cônjuge até 65 anos e filhos solteiros menores de 18 anos.
                        <br>AVANÇADO: Este plano oferece cobertura ao titular e cônjuge sem limite de idade e filhos solteiros menores de 18 anos
                        <br>SÊNIOR: Este plano oferece cobertura ao titular e cônjuge até 65 anos, filhos solteiros menores de 18 anos e pais ou sogros do titular.
                    </p>
                </div>

                <div id="texto2" class="row">
                    <p id="paragrafo3"><b>IMPORTANTÍSSIMO:</b></p>
                    <p id="paragrafo4">
                        1. Mantenha sempre seu endereço atualizado; 2. Mantenha sempre seus documentos e de seus familiares em dia, como CPF, RG, título de eleitor, certidão
                        de casamento, certidão de nascimento; 3. A Carência deste plano para prestação de serviços funerários e locação de materiais para convalescente deverá
                        ser cumprida conforme cláusula IX; 4. A inadimplência provocará a suspensão automática dos serviços.
                    </p>
                </div>

                <div id="texto3" class="row">
                    <p id="paragrafo5" class="col-2">
                        ____/____/________
                    </p>
                    <p id="paragrafo6" class="col">
                        Assinatura do titular do plano: _______________________________________________________________________
                    </p>
                </div>
            </form>
        </div>
        <br>
    </main>
    <footer>

    </footer>
</body>

</html>
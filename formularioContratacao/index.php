<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
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
                "Nome" => "",
                "DataNascimento" => "",
                "GrauParentesco" => "",
                "CPF" => "",
                "FK_Dependente_Contratante" => 0
            ];
            
            
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
    
                $dataTblPlanoContratado = $conn->prepare("SELECT * FROM planoContratado WHERE FK_PlanoContratado_Contratante = ?");
                $rsc3 = $dataTblPlanoContratado->execute([$_GET["FK_PlanoContratado_Contratante"]]);
                $dataTblPlanoContratado = $dataTblPlanoContratado->fetch();
    
                $dataTblPlano = $conn->prepare("SELECT * FROM plano");
                $rsc4 = $dataTblPlano->execute();
                $dataTblPlano = $dataTblPlano->fetch();
    
                $dataTblDependente = $conn->prepare("SELECT * FROM dependente WHERE FK_Dependente_Contratante = ?");
                $rsc5 = $dataTblDependente->execute([$_GET["FK_Dependente_Contratante"]]);
                $dataTblDependente = $dataTblDependente->fetch();

            } catch (PDOException $pe){
                echo "ERROR: " . $pe->getMessage();
            }
            
            echo "<pre>";
        print_r($dataTblContratante);
        echo "</pre>";
        ?>

        

    </header>
    <main>
        <br>
        <div id="cabecalho">
            <img src="assets/img/Logo Up Assistência Cor.png" id="logoUP">
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
                            <label for="nome">Nome:
                                <input type="text" id="nome" name="nome" value="<?= $dataTblContratante['Nome'] ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="contratoNumero">Contrato Nº:
                                <input type="text" id="contratoNumero" name="contratoNumero" value="<?= $dataTblContratante['ContratoNumero'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="cpf">CPF:
                                <input type="text" id="cpf" name="cpf" value="<?= $dataTblContratante['CPF'] ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="rg">RG:
                                <input type="text" id="rg" name="rg" value="<?= $dataTblContratante['RG'] ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="dataNascimento">Data de Nascimento:
                                <input type="text" id="dataNascimento" name="dataNascimento" value="<?= $dataTblContratante['DataNascimento'] ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="profissao">Profissão:
                                <input type="text" id="profissao" name="profissao" value="<?= $dataTblContratante['Profissao'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-7" id="ajustes">
                            <label for="endereco">Endereço:
                                <input type="text" id="endereco" name="endereco" value="<?= $dataTblEndereco['Endereco'] ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="numero">Nº:
                                <input type="text" id="numero" name="numero" value="<?= $dataTblEndereco['Numero'] ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="bairro">Bairro:
                                <input type="text" id="bairro" name="bairro" value="<?= $dataTblEndereco['Bairro'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9" id="multiplaEscolha"> <span>Sexo:</span>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoMasculino">
                                    Masculino
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="M" <?= ($dataTblContratante['Sexo'] == "M" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoFeminino">
                                    Feminino
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoFeminino" value="F" <?= ($dataTblContratante['Sexo'] == "F" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoNaoBinario">
                                    Não-binário
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoNaoBinario" value="N/B" <?= ($dataTblContratante['Sexo'] == "N/B" ? "checked" : "") ?>>
                            </div>
                            </div>
                        <div class="col-3" id="ajustes">
                            <label for="celular">Celular:
                                <input type="text" id="celular" name="celular" value="<?= $dataTblContratante['Celular'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="cidade">Cidade:
                                <input type="text" id="cidade" name="cidade" value="<?= $dataTblEndereco['Cidade'] ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="estado">Estado:
                                <select name="estado" id="estado" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
                                    <option value="" disabled="" selected=""></option>
                                    <option <?= ($dataTblEndereco['Estado'] == "1" ? "selected" : "") ?> value="1">Acre</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "2" ? "selected" : "") ?> value="2">Alagoas</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "3" ? "selected" : "") ?> value="3">Amapá</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "4" ? "selected" : "") ?> value="4">Amazonas</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "5" ? "selected" : "") ?> value="5">Bahia</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "6" ? "selected" : "") ?> value="6">Ceará</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "7" ? "selected" : "") ?> value="7">Distrito Federal</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "8" ? "selected" : "") ?> value="8">Espírito Santo</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "9" ? "selected" : "") ?> value="9">Goiás</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "10" ? "selected" : "") ?> value="10">Maranhão</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "11" ? "selected" : "") ?> value="11">Mato Grosso</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "12" ? "selected" : "") ?> value="12">Mato Grosso do Sul</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "13" ? "selected" : "") ?> value="13">Minas Gerais</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "14" ? "selected" : "") ?> value="14">Pará</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "15" ? "selected" : "") ?> value="15">Paraíba</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "16" ? "selected" : "") ?> value="16">Paraná</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "17" ? "selected" : "") ?> value="17">Pernambuco</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "18" ? "selected" : "") ?> value="18">Piauí</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "19" ? "selected" : "") ?> value="19">Rio de Janeiro</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "20" ? "selected" : "") ?> value="20">Rio Grande do Norte</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "21" ? "selected" : "") ?> value="21">Rio Grande do Sul</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "22" ? "selected" : "") ?> value="22">Rondônia</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "23" ? "selected" : "") ?> value="23">Roraima</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "24" ? "selected" : "") ?> value="24">Santa Catarina</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "25" ? "selected" : "") ?> value="25">São Paulo</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "26" ? "selected" : "") ?> value="26">Sergipe</option>
                                    <option <?= ($dataTblEndereco['Estado'] == "27" ? "selected" : "") ?> value="27">Tocantins</option>
                                </select>
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="CEP">CEP:
                                <input type="text" id="CEP" name="CEP" value="<?= $dataTblEndereco['CEP'] ?>">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="telefone">Telefone:
                                <input type="text" id="telefone" name="telefone" value="<?= $dataTblContratante['Telefone'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4" id="ajustes">
                            <label for="planoContratado">Plano Contratado:
                                <input type="text" id="planoContratado" name="planoContratado">
                            </label>
                        </div>
                        <div class="col-6" id="multiplaEscolha"><span>Método Cobrança:</span>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="cartaoCredito">
                                    Cartão de crédito
                                </label>
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="cartaoCredito" value="1" <?= ($dataTblPlanoContratado['MetodoCobranca'] == "1" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="energisa">
                                    Energisa
                                </label>
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="energisa" value="2" <?= ($dataTblPlanoContratado['MetodoCobranca'] == "2" ? "checked" : "") ?>>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoNaoBinario">
                                    Carnê
                                </label>
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="sexoNaoBinario" value="3" <?= ($dataTblPlanoContratado['MetodoCobranca'] == "3" ? "checked" : "") ?>>
                            </div>
                        </div>

                        <div class="col-2" id="ajustes">
                            <label for="vencimento">Vencimento:
                                <input type="text" id="vencimento" name="vencimento" value="<?= $dataTblPlanoContratado['Vencimento'] ?>">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3" id="ajustes">
                            <label for="estadoCivil">Estado Civil:
                                <select name="EstadoCivil" id="EstadoCivil" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
                                    <option value="" disabled="" selected=""></option>
                                    <option <?= ($dataTblContratante['EstadoCivil'] == "1" ? "selected" : "") ?> value="1">Solteiro</option>
                                    <option <?= ($dataTblContratante['EstadoCivil'] == "2" ? "selected" : "") ?> value="2">Noivo</option>
                                    <option <?= ($dataTblContratante['EstadoCivil'] == "3" ? "selected" : "") ?> value="3">Casado</option>
                                    <option <?= ($dataTblContratante['EstadoCivil'] == "4" ? "selected" : "") ?> value="4">Divorciado</option>
                                    <option <?= ($dataTblContratante['EstadoCivil'] == "5" ? "selected" : "") ?> value="5">Viúvo</option>
                                </select>                            
                            </label>
                        </div>
                        <div class="col-7" id="ajustes">
                            <label for="email">E-mail:
                                <input type="email" id="email" name="email" value="<?= $dataTblContratante['Email'] ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="valor">Valor:
                                <input type="text" id="valor" name="valor" value="<?= $dataTblPlanoContratado['Valor'] ?>">
                            </label>
                        </div>
                    </div>
                </div>

                <div id="dependentes">
                    <div class="row" id="titulo">
                        <label class="col-mb-12">Dependentes</label>
                    </div>

                    <div class="row" id="cabecalhoDependentes">
                        <label class="col-5 nomeColunaDependentes1">NOME</label>
                        <label class="col-2 nomeColunaDependentes1 nomeColunaDependentes2">DATA DE NASCIMENTO </label>
                        <label class="col-2 nomeColunaDependentes1 nomeColunaDependentes2">GRAU DE PARENTESCO</label>
                        <label class="col-3 nomeColunaDependentes2">CPF</label>
                    </div>
                    
                    <?php $quantidadeDependentes = $conn->query("SELECT * FROM dependente");
                    
                    foreach($quantidadeDependentes as $dataTblDependente){
                    ?><div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:" 
                            <?php 
                                if (isset($dataTblDependente['Nome'])) {$nomeDependente = $dataTblDependente['Nome'];
                                } else {
                                    $nomeDependente = "";
                                }
                            ?> value="<?= $nomeDependente ?>">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:" 
                            <?php 
                                if (isset($dataTblDependente['DataNascimento'])) {$dataNascimentoDendente = $dataTblDependente['DataNascimento'];
                                } else {
                                    $dataNascimentoDendente = "";
                                }
                            ?> value="<?= $dataNascimentoDendente ?>">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:" 
                        <?php 
                            if (isset($dataTblDependente['GrauParentesco'])) {$dataGrauParentesco = $dataTblDependente['GrauParentesco'];
                            } else {
                                $dataGrauParentesco = "";
                            }
                        ?> value="<?= $dataGrauParentesco ?>">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:"
                        <?php 
                            if (isset($dataTblDependente['CPF'])) {$dataCPF = $dataTblDependente['CPF'];
                            } else {
                                $dataCPF = "";
                            }
                        ?> value="<?= $dataCPF ?>">
                    </div>
                    <?php
                    }
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
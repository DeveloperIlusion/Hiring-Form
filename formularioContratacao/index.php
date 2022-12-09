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
                "EstadoCivil" => "",
                "Email" => "",
                "Profissao" => "",
                "Celular" => "",
                "Telefone" => ""
            ];
            
            try {
                $conn = new PDO(
                    "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                    "root",
                    ""                
                );

                $dataTblContratante = $conn->prepare("SELECT * FROM contratante Where idContratante = ?");
                $rsc1 = $dataTblContratante->execute([$_GET['idContratante']]);
                $dataTblContratante = $dataTblContratante->fetch();

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
                                <input type="text" id="endereco" name="endereco">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="numero">Nº:
                                <input type="text" id="numero" name="numero">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="bairro">Bairro:
                                <input type="text" id="bairro" name="bairro">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9" id="multiplaEscolha"> <span>Sexo:</span>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoMasculino">
                                    M
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoFeminino">
                                    F
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoFeminino">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="sexoNaoBinario">
                                    N/B
                                </label>
                                <input class="form-check-input" type="radio" name="sexo" id="sexoNaoBinario">
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
                                <input type="text" id="cidade" name="cidade">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="estado">Estado:
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
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="CEP">CEP:
                                <input type="text" id="CEP" name="CEP">
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
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="cartaoCredito">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="energisa">
                                    Energisa
                                </label>
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="energisa">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="carne">
                                    Carnê
                                </label>
                                <input class="form-check-input" type="radio" name="metodoCobranca" id="carne">
                            </div>
                            </div>
                        <div class="col-2" id="ajustes">
                            <label for="vencimento">Vencimento:
                                <input type="text" id="vencimento" name="vencimento">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3" id="ajustes">
                            <label for="estadoCivil">Estado Civil:
                                <input type="text" id="estadoCivil" name="estadoCivil" value="<?= $dataTblContratante['EstadoCivil'] ?>">
                            </label>
                        </div>
                        <div class="col-7" id="ajustes">
                            <label for="email">E-mail:
                                <input type="email" id="email" name="email" value="<?= $dataTblContratante['Email'] ?>">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="valor">Valor:
                                <input type="text" id="valor" name="valor">
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

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>

                    <div class="row">
                        <input type="text" id="nome" class="col-5  ajustes" placeholder="Nome:">
                        <input type="date" id="dataNascimento" class="col-2 ajustes" placeholder="Data de nascimento:">
                        <input type="text" id="grauParentesco" class="col-2 ajustes" placeholder="Grau de parentesco:">
                        <input type="text" id="cpf" class="col-3 ajustes" placeholder="CPF:">
                    </div>
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
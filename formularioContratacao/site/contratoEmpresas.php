<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contrato</title>
    <link rel="icon" href="../assets/img/Logo Up Assistência Cor.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="../assets/css/styleContrato.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php
            try {
                $conn = new PDO(
                    "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                    "root",
                    ""
                );

            } catch (PDOExCEPtion $pe){
                echo "ERROR: " . $pe->getMessage();
            }
        ?>
    </header>
    <main>
        <br>
        <div id="cabecalhoContratoPAF">
            <h5>CONTRATO DE PRESTAÇÃO DE SERVIÇOS DO PLANO UP ASSISTÊNCIA
            <br>FAMILIAR E AUXÍLIO À SAÚDE EMPRESARIAL</h5>
        </div>
        <div class="container" id="formulario">
            <h5>Nº ________</h5>
            <form method="POST">
                <div id="contratante">
                    <div class="row" id="titulo">
                        <label class="col-mb-12" id="titulosTabela">Dados da Contratante/Empresa</label>
                    </div>

                    <div class="row">
                        <div class="col-10" id="ajustes">
                            <label for="RazaoSocial">Razão Social:
                                <input type="text" id="RazaoSocial" name="RazaoSocial" size="130%" maxlength="255">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="CNPJ" id="CNPJlabel">CNPJ:
                                <input type="text" id="CNPJ" size="14%" name="CNPJ" maxlength="13" required>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6" id="ajustes">
                            <label for="NomeFantasia">Nome Fantasia:
                                <input type="text" id="NomeFantasia" name="NomeFantasia" size="50%" maxlength="11">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Telefone">Telefone:
                                <input type="text" id="Telefone" name="Telefone" maxlength="10">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Celular">Celular:
                                <input type="text" id="Celular" name="Celular" maxlength="10">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-9" id="ajustes">
                            <label for="Endereco">Endereço:
                                <input type="text" id="Endereco" name="Endereco" size="76%" maxlength="100">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Numero">Nº:
                                <input type="text" id="Numero" name="Numero" maxlength="8">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5" id="ajustes">
                            <label for="Bairro">Bairro:
                                <input type="text" id="Bairro" name="Bairro" size="25%" maxlength="30">
                            </label>
                        </div>
                        <div class="col-3" id="ajustes">
                            <label for="Cidade">Cidade:
                                <input type="text" id="Cidade" name="Cidade" size="50%" maxlength="30">
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="UF">UF:
                                <select name="UF" id="UF" class="form-control selectpicker selectuf" data-style="btn btn-link" required="">
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
                            </label>
                        </div>
                        <div class="col-2" id="ajustes">
                            <label for="CEP">CEP:
                                <input type="text" id="CEP" name="CEP" size="15%" maxlength="8">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6" id="ajustes">
                            <label for="Complemento">Complemento:
                                <input type="text" id="Complemento" name="Complemento" size="7%" maxlength="10">
                            </label>
                        </div>
                        <div class="col-6" id="ajustes">
                            <label for="Email">E-mail:
                                <input type="Email" id="Email" name="Email" size="61%" maxlength="255">
                            </label>
                        </div>
                    </div>
                    
                    <div class="row" id="titulo">
                        <label class="col-mb-12" id="titulosTabela">Dados do Responsável Legal</label>
                    </div>

                    <div class="row">
                        <div class="col-12" id="ajustes">
                            <label for="RazaoResponsavelLegal">Razão do Responsável Legal:
                                <input type="text" id="RazaoResponsavelLegal" name="RazaoResponsavelLegal" size="130%" maxlength="255">
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6" id="ajustes">
                            <label for="PISorNIT">PIS/NIT:
                                <input type="text" id="PISorNIT" name="PISorNIT" size="70%" maxlength="255">
                            </label>
                        </div>
                        <div class="col-6" id="ajustes">
                            <label for="CPF">CPF:
                                <input type="text" id="CPF" name="CPF" size="66%" maxlength="255">
                            </label>
                        </div>
                    </div>
                    <div id="parteTextual">
                        <br>
                        <h5 id="tituloParteTextual">CONTRATADA:</h5>
                        <p id="textoContratoPAF">UP PLANO DE ASSISTÊNCIA FAMILIAR LTDA., sociedade empresária limitada inscrita no CNPJ
                            sob o nº 29.443.344/0001-57, com sede em Muriaé/MG, na Av. Constantino Pinto, nº104, neste
                            ato representado pelo seu sócio administrador <b>SAYMON LOVANTINO PINHEIRO</b>, brasileiro,
                            casado, inscrito no CPF sob o nº 104.050.796-48, e portador da Carteira de Identidade MG
                            16.883.109, SSPMG.
                        </p>
                        <p id="textoContratoPAF">
                            Pelo presente instrumento particular de contrato de prestação de serviços, as partes acima
                            qualificadas firmam o presente contrato, que se rege e condiciona pelas cláusulas a seguir:
                        </p>
                        <p id="textoContratoPAF">
                            <b>CLÁUSULA I: DO OBJETO:</b> O objeto deste contrato é a prestação de serviços de assistência
                            familiar que a CONTRATADA se compromete em prestar a CONTRATANTE, conforme
                            características do plano abaixo descriminado.
                        </p>
                        <h5 id="tituloParteTextual">CLÁUSULA II: DOS SERVIÇOS DE ASSISTÊNCIA</h5>
                        <p id="textoContratoPAF">
                            1. O serviço de assistência se dará pelas redes credenciadas, que têm por objeto
                            exclusivo o oferecimento de profissionais credenciados médicos, dentistas, psicólogos,
                            fisioterapeutas e rede de comércio como farmácias, laboratórios e clínicas pela CONTRATADA
                            aos empregados da CONTRATANTE, em toda a área de cobertura do plano assistencial,
                            conforme discriminada em “rede credenciada” no site <a href="https://upassistencial.com.br" >www.upassistencial.com.br</a>, a qual garantirá
                            descontos aos empregadosda CONTRATANTE e seus dependentes.<br>
                            2. NÃO SE TRATA DE MODALIDADE DE PLANO DE SAÚDE, mas de serviço de
                            operacionalização de descontos e benefícios pela CONTRATADA aos empregados da
                            CONTRATANTE, bem como seus dependentes.<br>
                            3. Os serviços descritos serão autorizados e prestados pela CONTRATADA, ou por empresa por
                            ela credenciada, não se responsabilizando a CONTRATADA por serviços executados sem
                            autorização,ou por terceiros não credenciados.
                        </p>
                        <h5 id="tituloParteTextual">CLÁUSULA III: DO SERVIÇO FUNERAL</h5>
                        <p id="textoContratoPAF">
                            4. A CONTRATADA se compromete a executar a prestação de serviço funeral padrão aos
                            empregados do CONTRATANTE e seus dependentes inscritos neste contrato após o prazo de
                            carência de 60 dias.<br>
                            5. No caso de falecimento de algum empregado da CONTRATANTE, ou de seus dependentes
                        </p>
                        <br/>
                        <br/>
                        <br/>
                        <p id="rodapeDaPagina">
                            <b>1</b>
                            <br>
                            _____________________________________________
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </main>
    <footer>

    </footer>
</body>

</html>
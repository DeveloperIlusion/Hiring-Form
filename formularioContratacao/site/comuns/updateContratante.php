<?php
    if (isset($_POST['idContratante'])) {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                "root",
                ""
            );

            $idContratante = $_POST['idContratante'];
            $FK_Endereco_Contratante = $_POST['idContratante'];
            $FK_PlanoContratado_Contratante = $_POST['idContratante'];
            $FK_Dependente_Contratante = $_POST['idContratante'];
            
            $dadosContratante = [
                $_POST['Nome'],
                $_POST['CPF'],
                $_POST['RG'],
                $_POST['DataNascimento'],
                $_POST['Sexo'],
                $_POST['EstadoCivil'],
                $_POST['Email'],
                $_POST['Profissao'],
                $_POST['Celular'],
                $_POST['Telefone'],
                $idContratante
            ];
            
            $dadosEndereco = [
                $_POST['Endereco'],
                $_POST['Numero'],
                $_POST['Bairro'],
                $_POST['Cidade'],
                $_POST['Estado'],
                $_POST['CEP'],
                $FK_Endereco_Contratante
            ];

            $dadosPlano = [
                $_POST['idPlano']
            ];

            $dadosPlanoContratado = [
                $_POST['MetodoCobranca'],
                $_POST['Valor'],
                $_POST['Vencimento'],
                $FK_PlanoContratado_Contratante
            ];

            $dadosDependente = [
                "Nomes" => $_POST['NomeDependente'],
                "Data" => $_POST['DataNascimentoDependente'],
                "Grau" => $_POST['GrauParentesco'],
                "CPF" => $_POST['CPFDependente'],
                "idDependente" => $_POST['idDependente']
            ];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dataTblContratante = $conn->prepare("UPDATE contratante 
                                    SET Nome = ?,  CPF = ?, RG = ?, DataNascimento = ?,
                                    Sexo = ?, EstadoCivil = ?, Email = ?, Profissao = ?, 
                                    Celular = ?, Telefone = ?
                                    WHERE idContratante = ?");
            
            $dataTblContratante->execute($dadosContratante);
        

            $dataTblEndereco = $conn->prepare("UPDATE endereco 
                                    SET Endereco = ?,  Numero = ?, Bairro = ?, 
                                    Cidade = ?, Estado = ?, CEP = ?
                                    WHERE FK_Endereco_Contratante = ?");
            
            $dataTblEndereco->execute($dadosEndereco);
           
            $dataTblPlanoContratado = $conn->prepare("UPDATE planocontratado 
                                    SET  MetodoCobranca = ?, Valor = ?, Vencimento = ?
                                    WHERE FK_PlanoContratado_Contratante = ?");
            
            $dataTblPlanoContratado->execute($dadosPlanoContratado);

            foreach ( $dadosDependente["Nomes"] as $cont => $dep ) {

                $dependente = [
                    $dep, 
                    $dadosDependente["Data"][$cont],
                    $dadosDependente["Grau"][$cont],
                    $dadosDependente["CPF"][$cont],
                    $dadosDependente["idDependente"][$cont]
                ];

            $dataTblDependente = $conn->prepare("UPDATE dependente 
                                    SET NomeDependente = ?,  DataNascimentoDependente = ?, GrauParentesco = ?, CPFDependente = ?
                                    WHERE idDependente = ?");
            
            $dataTblDependente->execute($dependente);
            }

            if ($dataTblContratante or $dataTblEndereco or $dataTblPlanoContratado or $dataTblDependente->rowCount() > 0) {
                header("Location: lista.php?msgSucesso=Dados do contratante alterados com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha na alteração dos dados do contratante.");
            }

        } catch (PDOExCEPtion $pe) {
            echo "ERROR: " . $pe->getMessage();
        }

    } else {
       header("Location: lista.php");
    }
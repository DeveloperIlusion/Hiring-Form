<?php
    if (isset($_POST['idContratante'])) {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                "root",
                ""
            );
            
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
                $_POST['Telefone']
            ];
            
            $dadosEndereco = [
                $_POST['Endereco'],
                $_POST['Numero'],
                $_POST['Bairro'],
                $_POST['Cidade'],
                $_POST['Estado'],
                $_POST['CEP']
            ];

            $dadosPlanoContratado = [
                $_POST['PlanoContratado'],
                $_POST['MetodoCobranca'],
                $_POST['Valor'],
                $_POST['Vencimento']
            ];

            $dadosPlano = [
                $_POST['Plano']
            ];

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dataTblContratante = $conn->prepare("UPDATE contratante 
                                    SET Nome = ?,  CPF = ?, RG = ?, DataNasciment0 = ?,
                                    Sexo = ?, EstadoCivil = ?, Email = ?, Profissao = ?, 
                                    Celular = ?, Telefone = ?
                                    WHERE idContratante = ?");
            
            $dataTblContratante->execute($dadosContratante);

            $dataTblEndereco = $conn->prepare("UPDATE endereco 
                                    SET Endereco = ?,  Numero = ?, Bairro = ?, 
                                    Cidade = ?, Estado = ?, CEP = ?
                                    WHERE idEndereco = ?");
            
            $dataTblEndereco->execute($dadosEndereco);

            $dataTblPlanoContratado = $conn->prepare("UPDATE planoContratado 
                                    SET PlanoContratado = ?,  MetodoCobranca = ?, Valor = ?, Vencimento = ?
                                    WHERE idPlanoContratado = ?");
            
            $dataTblPlanoContratado->execute($dadosPlanoContratado);

            $dataTblPlano = $conn->prepare("UPDATE plano SET Plano = ? WHERE idPlano = ?");
            
            $dataTblPlano->execute($dadosPlano);

            if ($dataTblContratante->rowCount() > 0) {
                header("Location: lista.php?msgSucesso=Dados do contratante alterados com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha na alteração dos dados do contratante.");
            }

        } catch (PDOException $pe) {
            echo "ERROR: " . $pe->getMessage();
        }

    } else {
        header("Location: lista.php");
    }
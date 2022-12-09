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


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dataTblContratante = $conn->prepare("UPDATE contratante 
                                    SET Nome = ?,  CPF = ?, RG = ?, DataNasciment0 = ?,
                                    Sexo = ?, EstadoCivil = ?, Email = ?, Profissao = ?, 
                                    Celular = ?, Telefone = ?
                                    WHERE idContratante = ?");
            
            $dataTblContratante->execute($dadosContratante);

            if ($dataTblContratante->rowCount() > 0) {
                header("Location: lista.php?msgSucesso=Dados do contratante alterados com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha na alteração dos dados do contratante.");
            }

            $dataTblEndereco = $conn->prepare("UPDATE contratante 
                                    SET Endereco = ?,  Numero = ?, Bairro = ?, Cidade = ?,
                                    Estado = ?, CEP = ?
                                    WHERE idEndereco = ?");
            
            $dataTblEndereco->execute($dadosEndereco);

            if ($dataTblEndereco->rowCount() > 0) {
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
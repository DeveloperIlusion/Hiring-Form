<?php
    if (isset($_POST['Nome'])) {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=formulariocontratante",
                "root",
                ""
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dataTblContratante = $conn->prepare("INSERT INTO contratante 
                                    (Nome, CPF, RG, DataNascimento, Sexo, EstadoCivil, Email, Profissao, Celular, Telefone)
                                    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $dataTblContratante->execute([
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
            ]);


            $idCliente = $conn->lastInsertId();
            
            
            $dataTblEndereco = $conn->prepare("INSERT INTO endereco 
                                (Endereco, Numero, Bairro, Cidade, Estado, CEP, FK_Endereco_Contratante)
                                VALUES ( ?, ?, ?, ?, ?, ?, ?)");

            $dataTblEndereco->execute([
                $_POST['Endereco'], 
                $_POST['Numero'],
                $_POST['Bairro'], 
                $_POST['Cidade'], 
                $_POST['Estado'], 
                $_POST['CEP'],
                $idCliente
            ]);  
            
            $dataTblPlanoContratado = $conn->prepare("INSERT INTO planocontratado 
                                ( PlanoContratado, MetodoCobranca, Valor, Vencimento, FK_PlanoContratado_Contratante)
                                VALUES ( ?, ?, ?, ?, ?)");

            $dataTblPlanoContratado->execute([ 
                $_POST['idPlano'],
                $_POST['MetodoCobranca'],
                $_POST['Valor'], 
                $_POST['Vencimento'],
                $idCliente
            ]);

            foreach (  $_POST['NomeDependente'] as $cont => $dep ) {

                if (empty($dep)) {
                    break;
                }

                $dependente = [
                    $dep, 
                    $_POST["DataNascimentoDependente"][$cont],
                    $_POST["GrauParentesco"][$cont],
                    $_POST["CPFDependente"][$cont],
                    $idCliente
                ];

            $dataTblDependente = $conn->prepare("INSERT INTO dependente
                                (NomeDependente, DataNascimentoDependente, GrauParentesco, CPFDependente, FK_Dependente_Contratante)
                                VALUES ( ?, ?, ?, ?, ?)");

            $dataTblDependente->execute($dependente);

        };

            if ($conn->lastInsertId() > 0) {
                header("Location: ../index.php?msgSucesso=Contratante cadastrado com sucesso.");
            } else {
                header("Location: ../index.php?msgError=Falha no cadastro do contratante.");
            }

        } catch (PDOExCEPtion $pe) {
            echo "ERROR: " . $pe->getMessage();
            
            $conn=mysqli_connect('localhost','root','','formulariocontratante');

            if(isset($_POST['CPF']) && isset($_POST['RG']))
                $CPF = $_POST['CPF'];
                $RG = $_POST['RG'];
                $CPFDuplicado=mysqli_query($conn,"select * from contratante where CPF='$CPF'");
                $RGDuplicado=mysqli_query($conn,"select * from contratante where RG='$RG'");

            if (mysqli_num_rows($CPFDuplicado)>0) {
                header("Location: ../index.php?msgError=Este CPF já foi cadastrado.");
            } elseif (mysqli_num_rows($RGDuplicado)>0) {
                header("Location: ../index.php?msgError=Este RG já foi cadastrado.");
            }
        }

    } else {
        header("Location: form.php");
    }
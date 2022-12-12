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
                                    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

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

            $dataTblEndereco = $conn->prepare("INSERT INTO endereco 
                                (Endereco, Numero, Bairro, Cidade, Estado, CEP)
                                VALUES ( ?, ?, ?, ?, ?, ?)");

            $dataTblEndereco->execute([
                $_POST['Endereco'], 
                $_POST['Numero'],
                $_POST['Bairro'], 
                $_POST['Cidade'], 
                $_POST['Estado'], 
                $_POST['CEP']
            ]);  

            $dataTblPlanoContratado = $conn->prepare("INSERT INTO planocontratado 
                                ( MetodoCobranca, Valor, Vencimento)
                                VALUES ( ?, ?, ?)");

            $dataTblPlanoContratado->execute([ 
                $_POST['MetodoCobranca'],
                $_POST['Valor'], 
                $_POST['Vencimento']
            ]);  

            $dataTblDependente = $conn->prepare("INSERT INTO dependente
                                (NomeDependente, DataNascimentoDependente, GrauParentesco, CPFDependente)
                                VALUES ( ?, ?, ?, ?)");

            $dataTblDependente->execute([
                $_POST['NomeDependente'], 
                $_POST['DataNascimentoDependente'], 
                $_POST['GrauParentesco'], 
                $_POST['CPFDependente']
            ]);  

            if ($conn->lastInsertId() > 0) {
                header("Location: lista.php?msgSucesso=Município cadastrado com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha no cadastro do município.");
            }

        } catch (PDOExCEPtion $pe) {
            echo "ERROR: " . $pe->getMessage();
            
            $conn=mysqli_connect('localhost','root','','formulariocontratante');

            //if(isset($_POST['CPF']) && isset($_POST['RG']))
              //  $CPF = $_POST['CPF'];
                //$RG = $_POST['RG'];
                //$CPFDuplicado=mysqli_query($conn,"select * from contratante where CPF='$CPF'");
                //$RGDuplicado=mysqli_query($conn,"select * from contratante where RG='$RG'");

            //if (mysqli_num_rows($CPFDuplicado)>0) {
               // header("Location: lista.php?msgError=Este CPF já foi cadastrado.");
            //} elseif (mysqli_num_rows($RGDuplicado)>0) {
               // header("Location: lista.php?msgError=Este RG já foi cadastrado.");
            //}
        }

    } else {
        //header("Location: form.php");
    }
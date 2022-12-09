<?php
    if (isset($_POST['nome'])) {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=contratanteformulario",
                "root",
                ""
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = $conn->prepare("INSERT INTO contratante 
                                    (Nome, CPF, RG, DataNascimento, Sexo, EstadoCivil, Email, Profissao, Celular, Telefone)
                                    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
            
            $data->execute([
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
            ]);            

            if ($conn->lastInsertId() > 0) {
                header("Location: lista.php?msgSucesso=Município cadastrado com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha no cadastro do município.");
            }

        } catch (PDOException $pe) {
            echo "ERROR: " . $pe->getMessage();
            
            $conn=mysqli_connect('localhost','root','','contratanteformulario');

            if(isset($_POST['CPF']) and isset($_POST['RG']))
                $CPF = $_POST['CPF'];
                $RG = $_POST['RG'];
                $CPFDuplicado=mysqli_query($conn,"select * from municipio where CPF='$CPF'");
                $RGDuplicado=mysqli_query($conn,"select * from municipio where RG='$RG'");

            if (mysqli_num_rows($CPFDuplicado)>0) {
                header("Location: lista.php?msgError=Este CPF já foi cadastrado.");
            } elseif (mysqli_num_rows($RGDuplicado)>0) {
                header("Location: lista.php?msgError=Este RG já foi cadastrada.");
            }
        }

    } else {
        header("Location: form.php");
    }
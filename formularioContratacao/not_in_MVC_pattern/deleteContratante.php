<?php

    if (isset($_POST['idContratante'])) {

        try {        
            $conn = new PDO(
                "mysql:host=localhost;port=3306;dbname=formularioContratante",
                "root",
                ""
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dataTblContratante = $conn->prepare("DELETE FROM contratante 
                                    WHERE idContratante = ?");

            $dataTblContratante->execute([$_POST['idContratante']]);

            $dataTblEndereco = $conn->prepare("DELETE FROM Endereco 
                                    WHERE FK_Endereco_Contratante = ?");
            
            $dataTblEndereco->execute([$_POST['FK_Endereco_Contratante']]);

            $dataTblPlanoContratado = $conn->prepare("DELETE FROM PlanoContratado 
                                    WHERE FK_PlanoContratado_Contratante = ?");
            
            $dataTblPlanoContratado->execute([$_POST['FK_PlanoContratado_Contratante']]);

            $dataTblDependente = $conn->prepare("DELETE FROM dependente 
                                    WHERE FK_Dependente_Contratante = ?");
            
            $dataTblDependente->execute([$_POST['FK_Dependente_Contratante']]);

            if ($dataTblContratante->rowCount() > 0) {
                header("Location: ../index.php?msgSucesso=Contratante removido do banco de dados com sucesso.");
            } else {
                header("Location: ../index.php?msgError=Falha na remoção deste contratante, tente novamente ou acione o suporte.");
            }

        } catch (PDOExCEPtion $pe) {
            echo "ERROR: " . $pe->getMessage();
        }

    } else {
        header("Location: ../index.php");
    }
    
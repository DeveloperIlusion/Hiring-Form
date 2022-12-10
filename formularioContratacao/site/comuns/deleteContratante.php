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

            $dataTblEndereco = $conn->prepare("DELETE FROM endereco 
                                    WHERE FK_Endereco_Contratante = ?");
            
            $dataTblEndereco->execute([$_POST['FK_Endereco_Contratante']]);

            $dataTblPlanoContratado = $conn->prepare("DELETE FROM planoContratado 
                                    WHERE FK_PlanoContratado_Contratante = ?");
            
            $dataTblPlanoContratado->execute([$_POST['FK_PlanoContratado_Contratante']]);

            if ($dataTblContratante->rowCount() > 0) {
                header("Location: lista.php?msgSucesso=Município removido do banco de dados com sucesso.");
            } else {
                header("Location: lista.php?msgError=Falha na remoção do município do banco de dados.");
            }

        } catch (PDOException $pe) {
            echo "ERROR: " . $pe->getMessage();
        }

    } else {
        header("Location: lista.php");
    }
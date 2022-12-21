<?php
    require __DIR__ . "/read.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST['idContratante'], "*");

    if ($contractor){
        $contractor->destroy();
        header("Location: ../index.php?msgSucesso=Dados do contratante excluídos com sucesso.");
    } else {
        header("Location: ../index.php?msgError=Falha na exclusão dos dados do contratante.");
        var_dump($contractor);
    }
    
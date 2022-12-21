<?php
    require __DIR__ . "/read.php";

    use Source\Models\Contractor;
    use Source\Models\Address;
    use Source\Models\ContractedPlan;
    use Source\Models\Dependent;
    use Source\Models\Plan;

    if ($error){
        echo $error->getMessage();
        die();
    }

    if ($_GET['acao'] == "insert") 
    {
       $contractor = new Contractor();
       $address = new Address();
       $contractedPlan = new ContractedPlan();
       $dependent = new Dependent();
       $plan = (new Plan())->find()->fetch(true);
    } else {
        $contractor = (new Contractor())->findById($_GET['idContratante']);
        $address = (new Address())->find("FK_Endereco_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
        $contractedPlan = (new ContractedPlan())->find("FK_PlanoContratado_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
        $dependent = (new Dependent())->find("FK_Dependente_Contratante = :id", "id={$_GET["idContratante"]}", "*")->fetch();
        $plan = (new Plan())->find()->fetch(true);        
    }
    
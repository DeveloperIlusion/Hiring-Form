<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST['idContratante']);
    if ($contractor->save()) 
    {
        $contractor-> data();
    }
   
    use Source\Models\Address;

    $address = new Address;
    $address -> FK_Endereco_Contratante = $contractor -> idContratante;
    if ($address->save()) 
    {   
        $address-> data();
        $address->getContractor()->data();
    }

    use Source\Models\ContractedPlan;

    $contractedPlan = new ContractedPlan;
    $contractedPlan -> FK_PlanoContratado_Contratante = $contractor -> idContratante;
    if ($contractedPlan->save()) 
    {
        $contractedPlan-> data();
        $contractedPlan->getContractor()->data();
    }

    use Source\Models\Dependent;

    $dependent = new Dependent;
    $dependent -> FK_Dependente_Contratante = $contractor -> idContratante;
    if ($dependent->save()) 
    {
        $dependent-> data();
        $dependent->getContractor()->data();
    }

    $contractor-> save();

    use Source\Models\Plan;

    $plan = (new Plan())->find()->fetch(false);
    if ($plan->save())
    {
        $plan-> data();
    }

    $contractedPlan = new ContractedPlan;
    $contractedPlan -> PlanoContratado = $plan -> idPlano;
    if ($contractedPlan->save()) 
    {
        $contractedPlan-> data();
        $contractedPlan->getPlan()->data();
    }

    $plan-> save();

   
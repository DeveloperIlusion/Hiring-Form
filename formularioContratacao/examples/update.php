<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST["idContratante"]);
    $contractor-> Nome =  $_POST["Nome"];
    $contractor-> CPF = $_POST["CPF"];
    $contractor-> RG = $_POST["RG"];
    $contractor-> DataNascimento = $_POST["DataNascimento"];
    $contractor-> Sexo = $_POST["Sexo"];
    $contractor-> Celular = $_POST["Celular"];
    $contractor-> Telefone = $_POST["Telefone"];
    $contractor-> EstadoCivil = $_POST["EstadoCivil"];

    if ($contractor->save()) 
    {
        $contractor-> data();
    } else {
        $contractor->fail();
    }
   
    use Source\Models\Address;

    
    $address = (new Address())->find("FK_Endereco_Contratante = :id", "id={$_POST["idContratante"]}", "*")->fetch();
    $address -> FK_Endereco_Contratante =  $contractor -> idContratante;
    $address-> Endereco = $_POST["Endereco"];
    $address-> Numero = $_POST["Numero"];
    $address-> Bairro = $_POST["Bairro"];
    $address-> Cidade = $_POST["Cidade"];
    $address-> Estado = $_POST["Estado"];
    $address-> CEP = $_POST["CEP"];

    if ($address->save()) 
    {
        var_dump($address->data());
    } else {
        $address->fail();
    }
 
    use Source\Models\Dependent;

    $dependent = (new Dependent())->find("FK_Dependente_Contratante = :id", "id={$_POST["idContratante"]}", "*")->fetch();
    $dependent -> FK_Dependente_Contratante = $contractor -> idContratante;
    $dependent-> NomeDependente = $_POST["NomeDependente"];
    $dependent-> DataNascimentoDependente = $_POST["DataNascimentoDependente"];
    $dependent-> GrauParentesco = $_POST["GrauParentesco"];
    $dependent-> CPFDependente = $_POST["CPFDependente"];
    $dependent-> idDependente = $_POST["idDependente"];

    foreach ($dependent->NomeDependente as $cont => $dep) {
        $dependente = [
            $dep,
            $dependent->DataNascimentoDependente[$cont],
            $dependent->GrauParentesco[$cont],
            $dependent->CPFDependente[$cont],
            $dependent->idDependente[$cont]
        ];

        var_dump($dependente);
        $object = (object) $dependente;
        var_dump($object);
    }


    use Source\Models\Plan;

    $plan = (new Plan())->find()->fetch(false);
    if ($plan->save())
    {
        $plan->data();
    } else {
        $plan->fail();
    }

    use Source\Models\ContractedPlan;

    $contractedPlan = (new ContractedPlan())->find("FK_PlanoContratado_Contratante = :id", "id={$_POST["idContratante"]}", "*")->fetch();
    $contractedPlan -> FK_PlanoContratado_Contratante = $contractor -> idContratante;
    $contractedPlan-> MetodoCobranca = $_POST["MetodoCobranca"];
    $contractedPlan-> Valor = $_POST["Valor"];
    $contractedPlan -> Vencimento = $_POST["Vencimento"];

    if ($contractedPlan->save()) 
    {
        $contractedPlan->data();
    } else {
        $contractedPlan-> fail();
    }
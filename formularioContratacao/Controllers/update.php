<?php

    require __DIR__ . "/read.php";

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
    $address-> Endereco = $_POST["Endereco"];
    $address-> Numero = $_POST["Numero"];
    $address-> Bairro = $_POST["Bairro"];
    $address-> Cidade = $_POST["Cidade"];
    $address-> Estado = $_POST["Estado"];
    $address-> CEP = $_POST["CEP"];
    $address -> FK_Endereco_Contratante =  $contractor -> idContratante;

    if ($address->save()) 
    {
        $address->data();
    } else {
        $address->fail();
    }

    use Source\Models\ContractedPlan;

    $contractedPlan = (new ContractedPlan())->find("FK_PlanoContratado_Contratante = :id", "id={$_POST["idContratante"]}", "*")->fetch();
    $contractedPlan -> PlanoContratado = $_POST['idPlano'];
    $contractedPlan-> MetodoCobranca = $_POST["MetodoCobranca"];
    $contractedPlan-> Valor = $_POST["Valor"];
    $contractedPlan -> Vencimento = $_POST["Vencimento"];
    $contractedPlan -> FK_PlanoContratado_Contratante = $contractor -> idContratante;

    if ($contractedPlan->save()) 
    {
        $contractedPlan->data();
    } else {
        $contractedPlan-> fail();
    }
 
    use Source\Models\Dependent;

    foreach ( $_POST["idDependente"] as $count => $idDep) {
        $objDependente = (new Dependent())->findById($idDep);   

        $objDependente->NomeDependente = $_POST["NomeDependente"][$count];
        $objDependente->DataNascimentoDependente = $_POST["DataNascimentoDependente"][$count];
        $objDependente->GrauParentesco  = $_POST["GrauParentesco"][$count];
        $objDependente->CPFDependente = $_POST["CPFDependente"][$count];
        
        if ($objDependente->save()) 
        {
            var_dump($objDependente->data());
        } else {
            var_dump($objDependente-> fail());
        }        
    }

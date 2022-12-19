<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Address;
    use Source\Models\ContractedPlan;
    use Source\Models\Contractor;
    use Source\Models\Dependent;

    $contractor = new Contractor();
    $contracto->Nome =  $_POST['Nome'];
    $contractor->CPF = $_POST['CPF'];
    $contractor->RG = $_POST['RG'];
    $contractor->DataNascimento = $_POST['DataNascimento'];
    $contractor->Sexo = $_POST['Sexo'];
    $contractor->Celular = $_POST['Celular'];
    $contractor->Telefone = $_POST['Telefone'];
    $contractor->EstadoCivil = $_POST['EstadoCivil'];

    $address = new Address();
    $address->add(
        $_POST['Endereco'], 
        $_POST['Numero'],
        $_POST['Bairro'],
        $_POST['Cidade'], 
        $_POST['Estado'], 
        $_POST['CEP'], 
        $contractor);

    $contractedPlan = new ContractedPlan();
    $contractedPlan->add(
        $_POST['PlanoContratado'], 
        $_POST['MetodoCobranca'],
        $_POST['Valor'],
        $_POST['Vencimento'], 
        $contractor);

    $dependent = new Dependent();
    $dependent->add(
        $_POST['NomeDependente'], 
        $_POST['DataNascimentoDependente'],
        $_POST['GrauParentesco'],
        $_POST['CPFDependente'], 
        $contractor);

    $contractor-> save();
    
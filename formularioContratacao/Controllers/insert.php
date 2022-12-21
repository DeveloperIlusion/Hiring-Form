<?php

    require __DIR__ . "/read.php";

    use Source\Models\Address;
    use Source\Models\ContractedPlan;
    use Source\Models\Contractor;
    use Source\Models\Dependent;

    $contractor = new Contractor;
    $contractor->Nome =  $_POST['Nome'];
    $contractor->CPF = $_POST['CPF'];
    $contractor->RG = $_POST['RG'];
    $contractor->DataNascimento = $_POST['DataNascimento'];
    $contractor->Profissao = $_POST['Profissao'];
    $contractor->Sexo = $_POST['Sexo'];
    $contractor->Celular = $_POST['Celular'];
    $contractor->Telefone = $_POST['Telefone'];
    $contractor->EstadoCivil = $_POST['EstadoCivil'];
    $contractor->Email = $_POST['Email'];

    if ($contractor->save()) {
        echo "Usuário cadastrado";
        var_dump($contractor->data());
    } else {
        echo "<b>Erro ao cadastrar:</b> {$contractor->fail()->getMessage()}";
        var_dump($contractor->fail());
        die;
    }

    $address = new Address;
    $address-> Endereco = $_POST['Endereco'];
    $address-> Numero = $_POST['Numero'];
    $address-> Bairro = $_POST['Bairro'];
    $address-> Cidade = $_POST['Cidade']; 
    $address-> Estado = $_POST['Estado']; 
    $address-> CEP = $_POST['CEP'];
    $address-> FK_Endereco_Contratante = $contractor->idContratante;

    if ($address->save()) {
        echo "Endereço cadastrado";
        var_dump($address->data());
    } else {
        echo "<b>Erro ao endereço:</b> {$address->fail()->getMessage()}";
        var_dump($address->fail());
        die;
    }

    $contractedPlan = new ContractedPlan;
    $contractedPlan-> PlanoContratado = $_POST['idPlano'];
    $contractedPlan-> MetodoCobranca = $_POST['MetodoCobranca'];
    $contractedPlan-> Valor =  $_POST['Valor'];
    $contractedPlan-> Vencimento = $_POST['Vencimento'];
    $contractedPlan-> FK_PlanoContratado_Contratante = $contractor->idContratante;

    if ($contractedPlan->save()) {
        echo "Plano contratado cadastrado";
        var_dump($contractedPlan->data());
    } else {
        echo "<b>Erro ao cadastrar o plano contratado:</b> {$contractedPlan->fail()->getMessage()}";
        var_dump($contractedPlan->fail());
        die;
    }

    $dependent = new Dependent;
    $dependent-> NomeDependente = $_POST['NomeDependente'];
    $dependent-> DataNascimentoDependente = $_POST['DataNascimentoDependente'];
    $dependent-> GrauParentesco = $_POST['GrauParentesco'];
    $dependent-> CPFDependente = $_POST['CPFDependente'];
    $dependent -> FK_Dependente_Contratante = $contractor->idContratante;

    if ($dependent->save()) {
        echo "Dependente(s) cadastrado";
        var_dump($dependent->data());
    } else {
        echo "<b>Erro ao dependente(s):</b> {$dependent->fail()->getMessage()}";
        var_dump($dependent->fail());
        die;
    }

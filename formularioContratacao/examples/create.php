<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;
    use Source\Models\Endereco;

    $contractor = new Contractor();
    $contracto->Nome =  $_POST['Nome'];
    $contractor->CPF = $_POST['CPF'];
    $contractor->RG = $_POST['RG'];
    $contractor->DataNascimento = $_POST['DataNascimento'];
    $contractor->Sexo = $_POST['Sexo'];
    $contractor->Celular = $_POST['Celular'];
    $contractor->Telefone = $_POST['Telefone'];
    $contractor->EstadoCivil = $_POST['EstadoCivil'];
    $contractor->save();

    $endereco = new Endereco();
    $endereco->add($contractor(), $_POST['Endereco'], $_POST['Numero'],
    $_POST['Bairro'], $_POST['Estado'], $_POST['CEP']);
    $contractor-> save();
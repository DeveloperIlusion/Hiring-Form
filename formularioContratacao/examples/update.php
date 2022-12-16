<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST['idContratante']);
    $contractor-> Nome =  $_POST['Nome'];
    $contractor-> CPF = $_POST['CPF'];
    $contractor-> RG = $_POST['RG'];
    $contractor-> DataNascimento = $_POST['DataNascimento'];
    $contractor-> Sexo = $_POST['Sexo'];
    $contractor-> Celular = $_POST['Celular'];
    $contractor-> Telefone = $_POST['Telefone'];
    $contractor-> EstadoCivil = $_POST['EstadoCivil'];
   
    /* use Source\Models\Address;

    $address = new Address();
    $address->update(
        [$address-> $_POST['Endereco'], 
        $address-> $_POST['Numero'],
        $address-> $_POST['Bairro'],
        $address-> $_POST['Cidade'], 
        $address-> $_POST['Estado'], 
        $address-> $_POST['CEP']],
        
    ); */

    $contractor-> save();
    $address-> save();


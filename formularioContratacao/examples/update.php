<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST("idContratante"));
    $contracto-> Nome =  $_POST['Nome'];
    $contractor-> CPF = $_POST['CPF'];
    $contractor-> RG = $_POST['RG'];
    $contractor-> DataNascimento = $_POST['DataNascimento'];
    $contractor-> Sexo = $_POST['Sexo'];
    $contractor-> Celular = $_POST['Celular'];
    $contractor-> Telefone = $_POST['Telefone'];
    $contractor-> EstadoCivil = $_POST['EstadoCivil'];
    $contractor-> save();

    var_dump($contractor);
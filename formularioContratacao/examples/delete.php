<?php

    require __DIR__ . "/../vendor/autoload.php";

    use Source\Models\Contractor;

    $contractor = (new Contractor())->findById($_POST("idContratante"));

    if ($contractor){
        $contractor->destroy();
    } else {
        var_dump($contractor);
    }
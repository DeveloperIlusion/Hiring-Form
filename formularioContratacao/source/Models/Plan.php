<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Plan extends DataLayer{

        public function __construct()
        {
            parent:: __construct("plano", ["Plano"], "idPlano", false);
        }

        public function contractedPlan()
        {
            return (new ContractedPlan())->find("PlanoContratado = :planID",
            "planID={$this->idPlano}")->fetch(true);
        }
        
    }
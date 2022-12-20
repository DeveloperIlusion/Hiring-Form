<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Plan extends DataLayer{

        public function __construct()
        {
            parent:: __construct("plano", ["Plano"], 'idPlano', false);
        }

        public function contractedPlans()
        {
            return (new ContractedPlan())->find("PlanoContratado = :planId",
            "planId={$this->idPlano}")->fetch(true);
        }
        
    }
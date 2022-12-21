<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class ContractedPlan extends DataLayer
    {
        public function __construct()
        {
            parent:: __construct("planocontratado",
            ["PlanoContratado", "MetodoCobranca", "Valor", "Vencimento", "FK_PlanoContratado_Contratante"],
            'idPlanoContratado', false);
        }

        public function add(Plan $plan, int $MetodoCobranca, float $Valor, string $Vencimento, Contractor $contractor): ContractedPlan
        {
            $this->PlanoContratado = $plan->idPlano;
            $this->MetodoCobranca = $MetodoCobranca;
            $this->Valor = $Valor;
            $this->Vencimento = $Vencimento;
            $this->FK_PlanoContratado_Contratante = $contractor->idContratante;

            return $this;
        }

        public function getPlan(): ContractedPlan 
        {
            $this->Plan = (new Plan())->findById($this->idPlano)->data();
            return $this;
        }

        public function getContractor(): ContractedPlan 
        {
            $this->Contractor = (new Contractor())->findById($this->idContratante)->data();
            return $this;
        }
    }

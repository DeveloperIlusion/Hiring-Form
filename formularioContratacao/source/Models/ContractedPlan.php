<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class ContractedPlan extends DataLayer
    {
        public function __construct()
        {
            parent:: __construct("planocontratado",
            ["PlanoContratado", "MetodoCobranca", "Valor", "Vencimento", "FK_PlanoContratado_Contratante"],
            "idPlano", false);
        }

        public function add(Plan $PlanoContratado, int $MetodoCobranca, float $Valor, string $Vencimento, Contractor $contractor): ContractedPlan
        {
            $this->PlanoContratado = $PlanoContratado;
            $this->MetodoCobranca = $MetodoCobranca;
            $this->Valor = $Valor;
            $this->Vencimento = $Vencimento;
            $this->FK_PlanoContratado_Contratante = $contractor->idContratante;

            return $this;
        }
    }
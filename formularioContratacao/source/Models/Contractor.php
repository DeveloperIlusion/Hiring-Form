<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Contractor extends DataLayer
    {
        public function __construct()
        {
            parent:: __construct("contratante", 
            ["Nome", "CPF", "RG", "DataNascimento", "Sexo", "Celular", "Telefone", "EstadoCivil"],
            "idContratante", false);
        }

        public function addresses()
        {
            return (new Address())->find("FK_Endereco_Contratante = :contratanteId", 
            "contratanteId={$this->idContratante}")->fetch(true);
        }

        public function contractedPlans()
        {
            return (new ContractedPlan())->find("FK_PlanoContratado_Contratante = :contratanteId", 
            "contratanteId={$this->idContratante}")->fetch(true);
        }

        public function dependents()
        {
            return (new Dependent())->find("FK_Dependente_Contratante = :contratanteId",
            "contratanteId={$this->idContratante}")->fetch(true);
        }
    }
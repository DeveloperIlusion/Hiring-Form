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

        public function enderecos()
        {
            return (new Endereco())->find("FK_Endereco_Contratante = :contratanteId", "contratanteId={$this->idContratante}")->fetch(true);
        }
    }
<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Address extends DataLayer
    {
        public function __construct()
        {
            parent:: __construct ("endereco", 
            ["Endereco", "Numero", "Bairro", "Cidade", "Estado", "CEP", "FK_Endereco_Contratante"],
            "idEndereco", false);
        }

        public function add(string $Endereco, string $Numero, string $Cidade, string $Bairro, int $Estado ,string $CEP, Contractor $contractor): Address 
        {
            $this->Endereco = $Endereco;
            $this->Numero = $Numero;
            $this->Cidade = $Cidade;
            $this->Bairro = $Bairro;
            $this->Estado = $Estado;
            $this->CEP = $CEP;
            $this ->FK_Endereco_Contratante = $contractor->idContratante;

            return $this;
        }

        public function getContractor(): Address 
        {
            $this->Contractor = (new Contractor())->findById($this->idContratante)->data();
            return $this;
        }
    }
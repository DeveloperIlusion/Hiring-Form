<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Address extends DataLayer{
        public function __construct()
        {
            parent:: __construct ("endereco", 
            ["Endereco", "Numero", "Bairro", "Cidade", "Estado", "CEP", "FK_Endereco_Contratante"],
            "idEndereco", false);
        }

        public function add(string $endereco, string $numero, string $bairro, string $cidade, int $estado ,string $cep, Contractor $contractor): Address 
        {
            $this->Endereco = $endereco;
            $this->Numero = $numero;
            $this->Cidade = $cidade;
            $this->Bairro = $bairro;
            $this->Estado = $estado;
            $this->CEP = $cep;
            $this ->FK_Endereco_Contratante = $contractor->idContratante;

            return $this;
        }
    }
<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Endereco extends DataLayer{
        public function __construct()
        {
            parent:: __construct ("endereco", 
            ["Endereco", "Numero", "Bairro", "Cidade", "Estado", "CEP", "FK_Endereco_Contratante"],
            "idEndereco", false);
        }

        public function add(string $endereco, string $numero, string $bairro, int $estado ,string $cep, Contractor $contractor): Endereco 
        {
            $this->Endereco = $endereco;
            $this->Numero = $numero;
            $this->Bairro = $bairro;
            $this->Estado = $estado;
            $this->CEP = $cep;
            $this ->FK_Endereco_Contratante = $contractor->idContratante;

            return $this;
        }
    }
<?php 

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Dependent extends DataLayer
    {    
        public function __construct()
        {
            parent:: __construct("dependente",
            ["NomeDependente","DataNascimentoDependente", "GrauParentesco", "CPFDependente", "FK_Dependente_Contratante"],
            'idDependente', false);
        }

        public function add(string $NomeDependente, string $DataNascimentoDependente, string $GrauParentesco, string $CPFDependente, Contractor $contractor): Dependent
        {
            $this->NomeDependente = $NomeDependente;
            $this->DataNascimentoDependente = $DataNascimentoDependente;
            $this->GrauParentesco = $GrauParentesco;
            $this->CPFDependete = $CPFDependente;
            $this->FK_Dependente_Contratante = $contractor->idContratante;

            return $this;
        }

        public function getContractor(): Dependent 
        {
            $this->Contractor = (new Contractor())->findById($this->idContratante)->data();
            return $this;
        }
    } 
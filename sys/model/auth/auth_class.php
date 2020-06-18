<?php

    require_once '../../config/connect.php';
    class auth_class{
        //protected $tabela;
        private $id;
        private $senha;
        private $cpf;

        //set's
        public function setId($id){$this->id = $id;}
        public function setSenha($senha){$this->senha = $senha;}
        public function setCPF($cpf){$this->cpf = $cpf;}
        //get's
        public function getId(){return $this->id;}
        public function getSenha(){return $this->senha;}
        public function getCPF(){return $this->cpf;}  

    }
?>

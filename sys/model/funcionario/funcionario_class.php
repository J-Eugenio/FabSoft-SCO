<?php

    require_once '../../config/connect.php';
    class funcionario_class{
        private $id;
        private $cpf;
        private $senha;
        private $nome; 
        private $sobrenome; 
        private $genero;
        private $funcao;
        private $tipoDeFunc;
    
        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getCpf(){
            return $this->cpf;
        }
    
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
    
        public function getSenha(){
            return $this->senha;
        }
    
        public function setSenha($senha){
            $this->senha = $senha;
        }
    
        public function getNome(){
            return $this->nome;
        }
    
        public function setNome($nome){
            $this->nome = $nome;
        }


        public function getSobrenome(){
            return $this->sobrenome;
        }
    
        public function setSobrenome($sobrenome){
            $this->sobrenome = $sobrenome;
        }

    
        public function getGenero(){
            return $this->genero;
        }
    
        public function setGenero($genero){
            $this->genero = $genero;
        }
    
        public function getFuncao(){
            return $this->funcao;
        }
    
        public function setFuncao($funcao){
            $this->funcao = $funcao;
        }
    
        public function getTipoDeFunc(){
            return $this->tipoDeFunc;
        }
    
        public function setTipoDeFunc($tipoDeFunc){
            $this->tipoDeFunc = $tipoDeFunc;
        }

    }
?>

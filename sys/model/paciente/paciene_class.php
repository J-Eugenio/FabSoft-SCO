<?php
    class paciente_class{

        private $id;
        private $cpf;
        private $senha;
        private $nome; 
        private $dataNasc;
        private $idade;
        private $sexo;
        private $escolaridade;
        private $email;
        private $telefone;
        private $numeroCardSUS;
        private $unidadeDeSaude;
        private $dataDiagnostico;
        private $bairro;
        private $logradouro;
        private $pontoDeReferencia;
        private $zona;
        private $hospitalDeTratamento; 

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
    
        public function getDataNasc(){
            return $this->dataNasc;
        }
    
        public function setDataNasc($dataNasc){
            $this->dataNasc = $dataNasc;
        }
    
        public function getIdade(){
            return $this->idade;
        }
    
        public function setIdade($idade){
            $this->idade = $idade;
        }
    
        public function getSexo(){
            return $this->sexo;
        }
    
        public function setSexo($sexo){
            $this->sexo = $sexo;
        }
    
        public function getEscolaridade(){
            return $this->escolaridade;
        }
    
        public function setEscolaridade($escolaridade){
            $this->escolaridade = $escolaridade;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getTelefone(){
            return $this->telefone;
        }
    
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
    
        public function getNumeroCardSUS(){
            return $this->numeroCardSUS;
        }
    
        public function setNumeroCardSUS($numeroCardSUS){
            $this->numeroCardSUS = $numeroCardSUS;
        }
    
        public function getUnidadeDeSaude(){
            return $this->unidadeDeSaude;
        }
    
        public function setUnidadeDeSaude($unidadeDeSaude){
            $this->unidadeDeSaude = $unidadeDeSaude;
        }
    
        public function getDataDiagnostico(){
            return $this->dataDiagnostico;
        }
    
        public function setDataDiagnostico($dataDiagnostico){
            $this->dataDiagnostico = $dataDiagnostico;
        }
    
        public function getBairro(){
            return $this->bairro;
        }
    
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
    
        public function getLogradouro(){
            return $this->logradouro;
        }
    
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
    
        public function getPontoDeReferencia(){
            return $this->pontoDeReferencia;
        }
    
        public function setPontoDeReferencia($pontoDeReferencia){
            $this->pontoDeReferencia = $pontoDeReferencia;
        }
    
        public function getZona(){
            return $this->zona;
        }
    
        public function setZona($zona){
            $this->zona = $zona;
        }
    
        public function getHospitalDeTratamento(){
            return $this->hospitalDeTratamento;
        }
    
        public function setHospitalDeTratamento($hospitalDeTratamento){
            $this->hospitalDeTratamento = $hospitalDeTratamento;
        }
    }
?>
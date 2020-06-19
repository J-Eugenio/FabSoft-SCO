<?php

    require_once '../../config/connect.php';
    class service_class{
        //protected $tabela;
        private $id;
        private $service;
        private $tipoDeSonda;
        private $situacao;
        private $dataRegistro;
        private $horaRegistro;
        private $id_paciente;

        //set's
        public function setId($id){$this->id = $id;}
        public function setService($service){$this->service = $service;}
        public function setTipoDeSonda($tipoDeSonda){$this->tipoDeSonda = $tipoDeSonda;}
        public function setSituacao($situacao){$this->situacao = $situacao;}
        public function setDataRegistro($dataRegistro){$this->dataRegistro = $dataRegistro;}
        public function setHoraRegistro($horaRegistro){$this->horaRegistro = $horaRegistro;}
        public function setId_paciente($id_paciente){$this->id_paciente = $id_paciente;}
        //get's
        public function getId(){return $this->id;}
        public function getService(){return $this->service;}
        public function getTipoDeSonda(){return $this->tipoDeSonda;}
        public function getSituacao(){return $this->situacao;}
        public function getDataRegistro(){return $this->dataRegistro;}
        public function getHoraRegistro(){return $this->horaRegistro;}
        public function getId_paciente(){return $this->id_paciente;}


    }
?>

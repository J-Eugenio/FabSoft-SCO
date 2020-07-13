<?php

    require_once '../../config/connect.php';

    class transporte_class{

        private $id;
        private $lugarSolicitado;
        private $motivoSolicitacao;
        private $dataConsulta;
        private $horarioConsulta;
        private $id_paciente;
        private $user_type;
        
        //gets
        public function getId(){return $this->id;}
        public function getLugarSolicitado(){return $this->lugarSolicitado;}
        public function getMotivoSolicitacao(){return $this->motivoSolicitacao;}
        public function getDataConsulta(){return $this->dataConsulta;}
        public function getHorarioConsulta(){return $this->horarioConsulta;}
        public function getId_paciente(){return $this->id_paciente;}
        public function getUser_type(){return $this->user_type;}

        //sets
        public function setId($id){$this->id = $id;}
        public function setLugarSolicitado($lugarSolicitado){$this->lugarSolicitado = $lugarSolicitado;}
        public function setMotivoSolicitacao($motivoSolicitacao){$this->motivoSolicitacao = $motivoSolicitacao;}
        public function setDataConsulta($dataConsulta){$this->dataConsulta = $dataConsulta;}
        public function setHorarioConsulta($horarioConsulta){$this->horarioConsulta = $horarioConsulta;}
        public function setId_paciente($id_paciente){$this->id_paciente = $id_paciente;}
        public function setUser_type($user_type){$this->user_type = $user_type;}

    }
?>
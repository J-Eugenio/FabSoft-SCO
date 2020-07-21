<?php

    require_once '../../config/connect.php';
    class chamado_class {
        //
        private $id;
        private $assunto;
        private $textoDoChamado;
        private $data;
        private $hora;
        private $situacao;
        private $id_paciente;
        private $user_type;

        //set's
        public function setId($id){$this->id = $id;}
        public function setAssunto($assunto){$this->assunto = $assunto;}
        public function setTextoDoChamado($texto){$this->textoDoChamado = $texto;}
        public function setData($data){$this->data = $data;}
        public function setHora($hora){$this->hora = $hora;}
        public function setSituacao($situacao){$this->situacao = $situacao;}
        public function setId_paciente($id_p){$this->id_paciente = $id_p;}
        public function setUser_type($user_type){$this->user_type = $user_type;}

        //get's
        public function getId(){return $this->id;}
        public function getAssunto(){return $this->$assunto;}
        public function getTextoDoChamado(){return $this->textoDoChamado;}
        public function getData(){return $this->data;}
        public function getHora(){return $this->hora;}
        public function getSituacao(){return $this->situacao;}
        public function getId_paciente(){return $this->id_paciente;}
        public function getUser_type(){return $this->user_type;}
        
    }
?>
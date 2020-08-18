<?php

    require_once 'service_class.php';

    class service_DAO extends service_class{
        protected $tabela = 'services';
        
        public function findUnic($id){
            try{
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $erro){
                echo 'Erro ao buscar informação';
            }
        }
        public function findAll(){
            try{
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert(){
            try{
                $sql = "INSERT INTO $this->tabela(service, tipoDeSonda, situacao, dataRegistro, horaRegistro, user_type, id_paciente)
             VALUES (:service, :tipoDeSonda, :situacao, :dataRegistro, :horaRegistro, :user_type, :id_paciente)";
                $exec = DB::prepare($sql);
                $exec->bindValue(':service',$this->getService());
                $exec->bindValue(':tipoDeSonda',$this->getTipoDeSonda());
                $exec->bindValue(':situacao',$this->getSituacao());
                $exec->bindValue(':dataRegistro',$this->getDataRegistro());
                $exec->bindValue(':horaRegistro',$this->getHoraRegistro());
                $exec->bindValue(':user_type',$this->getUser_type());
                $exec->bindValue(':id_paciente',$this->getId_paciente());
				echo "<script>window.location ='../../view/services/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':situacao',$this->getSituacao());
                echo "<script>window.location ='../../view/services/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }
        public function delete(){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                echo "<script>window.location ='../../view/services/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarServices(){
            $result = null;
            $resultado = "SELECT * FROM $this->tabela ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'service' => $dados['service'],
                    'tipoDeSonda' => $dados['tipoDeSonda'],
                    'situacao' => $dados['situacao'],
                    'dataRegistro' => $dados['dataRegistro'],
                    'horaRegistro' => $dados['horaRegistro'],
                    'id_paciente' => $dados['id_paciente'],
                    'user_type' => $dados['user_type']
                );
            }

            return $result;
        }
    }
?>
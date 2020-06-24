<?php

    require_once '../../model/services/service_class.php';

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
        public function findAll($id){
            try{
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert($service, $tipoDeSonda, $situacao, $dataRegistro, $horaRegistro, $id_paciente){
            try{
                $sql = "INSERT INTO $this->tabela(service, tipoDeSonda, situacao, dataRegistro, horaRegistro, id_paciente)
             VALUES (:service, :tipoDeSonda, :situacao, :dataRegistro, :horaRegistro, :id_paciente)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':service',$service);
                $exec->bindParam(':tipoDeSonda',$tipoDeSonda);
                $exec->bindParam(':situacao',$situacao);
                $exec->bindParam(':dataRegistro',$dataRegistro);
                $exec->bindParam(':horaRegistro',$horaRegistro);
                $exec->bindParam(':id_paciente',$id_paciente);
				echo "<script>alert('Serviço cadastrado com sucesso!!');window.location ='../../view/services/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET service = :service, tipoDeSonda = :tipoDeSonda, situacao = :situacao,
                dataRegistro = :dataRegistro, horaRegistro = :horaRegistro, id_paciente = :id_paciente WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':service', $this->getService());
                $exec->bindValue(':tipoDeSonda', $this->getTipoDeSonda());
                $exec->bindValue(':situacao',$this->getSituacao());
                $exec->bindValue(':dataRegistro', $this->getDataRegistro());
                $exec->bindValue(':horaRegistro', $this->getHoraRegistro());
                $exec->bindValue(':id_paciente', $this->getId_paciente());
                echo "<script>alert('Serviço atualizado com sucesso!!');window.location ='../../view/services/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }
        public function delete($id){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                echo "<script>alert('Serviço deletado com sucesso!!');window.location ='../../view/services/Listar.php';</script>";

                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarServices(){
            $result[] = 0;
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
                    'horaRegistro' => $dados['horaRegistro']
                );
            }

            return $result;
        }
    }
?>